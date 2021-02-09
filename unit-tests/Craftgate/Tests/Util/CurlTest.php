<?php

namespace Craftgate\Tests\Util;

use Craftgate\Util\Curl;

class CurlTest extends \TestCase
{
    public function test_response_should_be_null_and_cause_exception()
    {
        $response = $exception = null;

        try {
            $response = Curl::get('foo', array());
        } catch (\Exception $exception) {
        }

        $this->assertNull($response);
        $this->assertNotNull($exception);
    }

    public function test_response_should_not_be_null_and_not_cause_exception()
    {
        $response = $exception = null;

        try {
            $response = Curl::get('https://httpbin.org/', array());
        } catch (\Exception $exception) {
        }

        $this->assertNotNull($response);
        $this->assertNull($exception);
    }
}
