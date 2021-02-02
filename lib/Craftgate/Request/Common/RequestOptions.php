<?php

namespace Craftgate\Request\Common;

class RequestOptions
{
    private $apiKey;
    private $secretKey;
    private $baseUrl;

    public function __construct(array $options = null)
    {
        isset($options['apiKey'])    && $this->apiKey    = $options['apiKey'];
        isset($options['secretKey']) && $this->secretKey = $options['secretKey'];
        isset($options['baseUrl'])   && $this->baseUrl   = $options['baseUrl'];
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getSecretKey()
    {
        return $this->secretKey;
    }

    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
}
