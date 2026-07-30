<?php

namespace Craftgate\Tests;

use Craftgate\Adapter\BaseAdapter;
use Craftgate\CraftgateOptions;
use Craftgate\Request\BaseRequest;
use Craftgate\Util\QueryBuilder;
use Craftgate\Util\Signature;

/** Exposes the protected header builder so headers can be asserted without a request. */
class HeaderProbeAdapter extends BaseAdapter
{
    public function headersFor($path, $request = null, $idempotencyKey = null)
    {
        return $this->prepareHeaders(null, $path, $request, $idempotencyKey);
    }

    public function keyOf($request)
    {
        return $this->idempotencyKeyOf($request);
    }
}

class IdempotencyTest extends \TestCase
{
    private function options()
    {
        return new CraftgateOptions(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'http://localhost:8000',
        ));
    }

    private function headerValue($headers, $name)
    {
        foreach ($headers as $header) {
            if (strpos($header, $name . ': ') === 0) {
                return substr($header, strlen($name) + 2);
            }
        }
        return null;
    }

    public function test_should_take_idempotency_key_out_of_request()
    {
        $request = array('cardUserKey' => 'user-key', 'idempotencyKey' => 'idempotency-key-1');

        $key = BaseRequest::takeIdempotencyKey($request);

        $this->assertEquals('idempotency-key-1', $key);
        $this->assertEquals(array('cardUserKey' => 'user-key'), $request);
    }

    public function test_should_return_null_when_request_has_no_idempotency_key()
    {
        $request = array('cardUserKey' => 'user-key');

        $this->assertNull(BaseRequest::takeIdempotencyKey($request));
        $this->assertEquals(array('cardUserKey' => 'user-key'), $request);
    }

    public function test_should_return_null_for_non_array_request()
    {
        $request = null;
        $this->assertNull(BaseRequest::takeIdempotencyKey($request));
    }

    public function test_should_send_idempotency_key_header_for_body_request()
    {
        $adapter = new HeaderProbeAdapter($this->options());
        $request = array('cardUserKey' => 'user-key');

        $headers = $adapter->headersFor('/payment/v1/cards', $request, 'idempotency-key-1');

        $this->assertEquals('idempotency-key-1', $this->headerValue($headers, 'x-idempotency-key'));
    }

    public function test_should_not_send_idempotency_key_header_when_absent()
    {
        $adapter = new HeaderProbeAdapter($this->options());
        $request = array('cardUserKey' => 'user-key');

        $headers = $adapter->headersFor('/payment/v1/cards', $request);

        $this->assertNull($this->headerValue($headers, 'x-idempotency-key'));
    }

    public function test_should_read_idempotency_key_off_a_path_only_wrapper()
    {
        $adapter = new HeaderProbeAdapter($this->options());

        $this->assertEquals('idempotency-key-1',
            $adapter->keyOf(array('token' => 'token-1', 'idempotencyKey' => 'idempotency-key-1')));
        $this->assertNull($adapter->keyOf(array('token' => 'token-1')));
        $this->assertNull($adapter->keyOf(null));
    }

    /** A regression here rejects every delete/approve/cancel call at the API. */
    public function test_should_not_change_bodyless_signature()
    {
        $adapter = new HeaderProbeAdapter($this->options());

        $headers = $adapter->headersFor('/installment/v1/installments', null, 'idempotency-key-1');

        $expected = Signature::generate($this->options(), '/installment/v1/installments',
            $this->headerValue($headers, 'x-rnd-key'), null);
        $this->assertEquals($expected, $this->headerValue($headers, 'x-signature'));
    }

    public function test_should_not_change_body_signature()
    {
        $adapter = new HeaderProbeAdapter($this->options());
        $request = array('cardUserKey' => 'de050909-39a9-473c-a81a-f186dd55cfef');

        $headers = $adapter->headersFor('/payment/v1/cards', $request, 'idempotency-key-1');

        $expected = Signature::generate($this->options(), '/payment/v1/cards',
            $this->headerValue($headers, 'x-rnd-key'), $request);
        $this->assertEquals($expected, $this->headerValue($headers, 'x-signature'));
    }

    /** An empty array must hash like a null one, so lifting the key out changes nothing. */
    public function test_empty_request_signs_like_a_null_request()
    {
        $options = $this->options();

        $this->assertEquals(
            Signature::generate($options, '/payment/v1/cards', '1234', null),
            Signature::generate($options, '/payment/v1/cards', '1234', array())
        );
    }

    public function test_query_builder_excludes_idempotency_key()
    {
        $query = QueryBuilder::build(array('foo' => 'bar', 'idempotencyKey' => 'idempotency-key-1'));

        $this->assertEquals('?foo=bar', $query);
        // strpos, because string-contains assertions differ across supported PHPUnit versions.
        $this->assertFalse(strpos($query, 'idempotencyKey'));
        $this->assertFalse(strpos($query, 'idempotency-key-1'));
    }

    public function test_query_builder_returns_empty_string_when_only_idempotency_key_is_set()
    {
        $this->assertEquals('', QueryBuilder::build(array('idempotencyKey' => 'idempotency-key-1')));
    }

    public function test_query_builder_leaves_the_callers_array_intact()
    {
        $params = array('foo' => 'bar', 'idempotencyKey' => 'idempotency-key-1');

        QueryBuilder::build($params);

        // Copy-on-write means the caller keeps its key.
        $this->assertEquals('idempotency-key-1', $params['idempotencyKey']);
    }
}
