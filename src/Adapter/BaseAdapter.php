<?php

namespace Craftgate\Adapter;

use Craftgate\CraftgateOptions;
use Craftgate\Request\HeaderOptions;
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

    protected function httpPost($path, $request = null, $headers = null, $optionsRequest = null)
    {
        $scopedOptions = isset($optionsRequest)
            ? HeaderOptions::of($optionsRequest)
            : HeaderOptions::takeFrom($request);
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, $request, $scopedOptions);

        return Curl::post($url, $headers, $request);
    }

    protected function httpPut($path, $request, $headers = null, $optionsRequest = null)
    {
        $scopedOptions = isset($optionsRequest)
            ? HeaderOptions::of($optionsRequest)
            : HeaderOptions::takeFrom($request);
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, $request, $scopedOptions);

        return Curl::put($url, $headers, $request);
    }

    protected function httpDelete($path, $headers = null, $optionsRequest = null)
    {
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, null, HeaderOptions::of($optionsRequest));

        return Curl::delete($url, $headers);
    }

    protected function prepareHeaders($headers, $path, $request = null, array $scopedOptions = array())
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
        return array_merge($headers, HeaderOptions::toHeaders($scopedOptions));
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
