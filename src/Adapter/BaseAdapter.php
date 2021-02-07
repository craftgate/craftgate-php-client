<?php

namespace Craftgate\Adapter;

use Craftgate\CraftgateOptions;
use Craftgate\Util\Curl,
    Craftgate\Util\Guid,
    Craftgate\Util\Signature;

class BaseAdapter
{
    private $options;

    public function __construct(CraftgateOptions $options)
    {
        $this->options = $options;
    }

    protected function httpGet($path)
    {
        $url     = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($path);

        return Curl::get($url, $headers);
    }

    protected function httpPost($path, $request)
    {
        $url     = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($path, $request);

        return Curl::post($url, $headers, $request);
    }

    protected function httpPut($path, $request)
    {
        $url     = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($path, $request);

        return Curl::put($url, $headers, $request);
    }

    protected function httpDelete($path)
    {
        $url     = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($path);

        return Curl::delete($url, $headers);
    }

    private function prepareHeaders($path, $request = null)
    {
        $headers = array(
            'accept: application/json',
            'content-type: application/json'
        );

        $headers[] = 'x-api-key: ' . $this->options->getApiKey();
        $headers[] = 'x-rnd-key: ' . ($randomString = Guid::generate());
        $headers[] = 'x-auth-version: v1';
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
