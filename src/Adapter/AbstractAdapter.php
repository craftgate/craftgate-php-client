<?php

namespace Craftgate\Adapter;

use Craftgate\ClientOptions;
use Craftgate\HttpClient\RestClientAdapter;
use Craftgate\Util\Guid,
    Craftgate\Util\Signature;

abstract class AbstractAdapter
{
    private $options;
    private $restClient;

    public function __construct(ClientOptions $options)
    {
        $this->options = $options;
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

        $headers[] = 'x-api-key: ' . $this->options->getApiKey();
        $headers[] = 'x-rnd-key: ' . ($randomString = Guid::generate());
        $headers[] = 'x-auth-version: v1';
        $headers[] = 'x-signature: ' . Signature::generate(
            $this->options, $path, $randomString, $request
        );

        return $headers;
    }

    protected function httpGet($path)
    {
        return $this->restClient->get($this->options->getBaseUrl() . $path,
            $this->createHttpHeaders($path));
    }

    protected function httpPost($path, $request)
    {
        return $this->restClient->post($this->options->getBaseUrl() . $path,
            $this->createHttpHeaders($path, $request), $request);
    }

    protected function httpPut($path, $request)
    {
        return $this->restClient->put($this->options->getBaseUrl() . $path,
            $this->createHttpHeaders($path, $request), $request);
    }

    protected function httpDelete($path)
    {
        return $this->restClient->delete($this->options->getBaseUrl() . $path,
            $this->createHttpHeaders($path));
    }
}
