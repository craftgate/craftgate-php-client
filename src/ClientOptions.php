<?php

namespace Craftgate;

class ClientOptions
{
    const API_URL = 'https://api.craftgate.io';
    const SANDBOX_API_URL = 'https://sandbox-api.craftgate.io';

    private $apiKey;
    private $secretKey;
    private $baseUrl = self::API_URL;

    public function __construct(array $options = null)
    {
        if ($options != null) {
            isset($options['apiKey'])    && $this->apiKey    = $options['apiKey'];
            isset($options['secretKey']) && $this->secretKey = $options['secretKey'];
            isset($options['baseUrl'])   && $this->baseUrl   = $options['baseUrl'];
        }
    }

    public function __debugInfo()
    {
        // Hides sensitive data (properties) while dump calls,
        // so toArray() method should be called for debugging.
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function getSecretKey()
    {
        return $this->secretKey;
    }

    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function toArray()
    {
        return array(
            'apiKey'    => $this->apiKey,
            'secretKey' => $this->secretKey,
            'baseUrl'   => $this->baseUrl,
        );
    }
}
