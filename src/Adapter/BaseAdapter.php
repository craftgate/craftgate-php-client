<?php

namespace Craftgate\Adapter;

use Craftgate\CraftgateOptions;
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

    protected function httpPost($path, $request = null, $headers = null)
    {
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, $request);

        return Curl::post($url, $headers, $request);
    }

    protected function httpPut($path, $request, $headers = null)
    {
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, $request);

        return Curl::put($url, $headers, $request);
    }

    protected function httpDelete($path, $headers = null)
    {
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path);

        return Curl::delete($url, $headers);
    }

    private function prepareHeaders($headers, $path, $request = null)
    {
        if ($headers == null) {
            $headers = array('accept: application/json', 'content-type: application/json');
        }
        $headers[] = 'x-api-key: ' . $this->options->getApiKey();
        $headers[] = 'x-rnd-key: ' . ($randomString = Guid::generate());
        $headers[] = 'x-auth-version: v1';
        $headers[] = 'x-client-version: craftgate-php-client:1.0.20';
        $headers[] = 'x-signature: ' . Signature::generate(
                $this->options, $path, $randomString, $request
            );
        return $headers;
    }

    private function prepareUrl($path)
    {
        return $this->options->getBaseUrl() . '/' . trim($path, '/');
    }
}
