<?php

namespace Craftgate\Adapter;

use Craftgate\HttpClient\RestClientAdapter;
use Craftgate\Util\Guid,
    Craftgate\Util\Signature;

class BaseAdapter
{
    private $requestOptions;
    private $restClient;

    public function __construct($requestOptions)
    {
        $this->requestOptions = $requestOptions;
        $this->restClient = new RestClientAdapter();
    }

    protected function setRestClient($restClient)
    {
        $this->restClient = $restClient;
    }

    protected function createHttpHeaders($path, $request = null)
    {
        $headers = array(
            'accept: application/json',
            'content-type: application/json'
        );

        $headers[] = 'x-api-key: ' . $this->requestOptions->getApiKey();
        $headers[] = 'x-rnd-key: ' . ($randomString = Guid::generate());
        $headers[] = 'x-auth-version: v1';
        $headers[] = 'x-signature: ' . Signature::generate(
            $this->requestOptions, $path, $randomString, $request
        );

        return $headers;
    }

    protected function httpGet($path)
    {
        return $this->restClient->get($this->requestOptions->getBaseUrl() . $path,
            $this->createHttpHeaders($path));
    }

    protected function httpPost($path, $request)
    {
        return $this->restClient->post($this->requestOptions->getBaseUrl() . $path,
            $this->createHttpHeaders($path, $request), $request);
    }

    protected function httpPut($path, $request)
    {
        return $this->restClient->put($this->requestOptions->getBaseUrl() . $path,
            $this->createHttpHeaders($path, $request), $request);
    }

    protected function httpDelete($path)
    {
        return $this->restClient->delete($this->requestOptions->getBaseUrl() . $path,
            $this->createHttpHeaders($path));
    }
}
