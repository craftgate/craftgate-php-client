<?php

namespace Craftgate\Adapter;

use Craftgate\CraftgateOptions;
use Craftgate\Request\BaseRequest;
use Craftgate\Util\Curl;
use Craftgate\Util\Guid;
use Craftgate\Util\Signature;

class BaseAdapter
{
    private $options;

    public function __construct(CraftgateOptions $options)
    {
        $this->options = $options;
    }

    protected function httpGet($path, $headers = null)
    {
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path);

        return Curl::get($url, $headers);
    }

    protected function httpPost($path, $request = null, $headers = null, $idempotencyKey = null)
    {
        // Lifted out before signing, or the key ends up in the body and the signature.
        if (!isset($idempotencyKey)) {
            $idempotencyKey = BaseRequest::takeIdempotencyKey($request);
        }
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, $request, $idempotencyKey);

        return Curl::post($url, $headers, $request);
    }

    protected function httpPut($path, $request, $headers = null, $idempotencyKey = null)
    {
        if (!isset($idempotencyKey)) {
            $idempotencyKey = BaseRequest::takeIdempotencyKey($request);
        }
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, $request, $idempotencyKey);

        return Curl::put($url, $headers, $request);
    }

    protected function httpDelete($path, $headers = null, $idempotencyKey = null)
    {
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, null, $idempotencyKey);

        return Curl::delete($url, $headers);
    }

    /**
     * Reads the idempotency key out of a path-only request wrapper.
     *
     * Such calls must pass null as the request: the wrapper's other keys are path variables, and
     * sending them as a body would change the signature.
     *
     * @param mixed $request request wrapper array
     * @return string|null
     */
    protected function idempotencyKeyOf($request)
    {
        return is_array($request) && isset($request[BaseRequest::IDEMPOTENCY_KEY])
            ? $request[BaseRequest::IDEMPOTENCY_KEY]
            : null;
    }

    protected function prepareHeaders($headers, $path, $request = null, $idempotencyKey = null)
    {
        if ($headers == null) {
            $headers = array('accept: application/json', 'content-type: application/json');
        }
        $headers[] = 'x-api-key: ' . $this->options->getApiKey();
        $headers[] = 'x-rnd-key: ' . ($randomString = Guid::generate());
        $headers[] = 'x-auth-version: v1';
        $headers[] = 'x-client-version: craftgate-php-client:1.0.53';
        $headers[] = 'x-signature: ' . Signature::generate(
                $this->options, $this->trimPath($path), $randomString, $request
            );
        $language = $this->options->getLanguage();
        if (isset($language)) {
            $headers[] = 'lang: ' . $language;
        }
        if (isset($idempotencyKey)) {
            $headers[] = 'x-idempotency-key: ' . $idempotencyKey;
        }
        return $headers;
    }

    private function prepareUrl($path)
    {
        return $this->options->getBaseUrl() . $this->trimPath($path);
    }

    private function trimPath($path)
    {
        return '/' . trim($path, '/');
    }
}
