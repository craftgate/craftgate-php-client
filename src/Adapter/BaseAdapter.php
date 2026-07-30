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

    protected function httpPost($path, $request = null, $headers = null, $headerOptions = null)
    {
        // Lifted out before signing, or the reserved keys end up in the body and the signature.
        $scopedOptions = isset($headerOptions)
            ? BaseRequest::optionsOf($headerOptions)
            : BaseRequest::takeOptions($request);
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, $request, $scopedOptions);

        return Curl::post($url, $headers, $request);
    }

    protected function httpPut($path, $request, $headers = null, $headerOptions = null)
    {
        $scopedOptions = isset($headerOptions)
            ? BaseRequest::optionsOf($headerOptions)
            : BaseRequest::takeOptions($request);
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, $request, $scopedOptions);

        return Curl::put($url, $headers, $request);
    }

    /**
     * Sends a body-less DELETE. \$headerOptions is a request wrapper whose reserved keys become headers;
     * it is never sent as a body, so the signature stays that of a body-less call.
     */
    protected function httpDelete($path, $headers = null, $headerOptions = null)
    {
        $url = $this->prepareUrl($path);
        $headers = $this->prepareHeaders($headers, $path, null, BaseRequest::optionsOf($headerOptions));

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
        return array_merge($headers, BaseRequest::toHeaders($scopedOptions));
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
