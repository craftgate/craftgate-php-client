<?php

namespace Craftgate;

class CraftgateOptions
{
    const API_URL = 'https://api.craftgate.io';

    private $apiKey;
    private $secretKey;
    private $baseUrl = self::API_URL;
    private $language;

    public function __construct(array $options = null)
    {
        if ($options != null) {
            isset($options['apiKey']) && $this->apiKey = $options['apiKey'];
            isset($options['secretKey']) && $this->secretKey = $options['secretKey'];
            isset($options['baseUrl']) && $this->baseUrl = $options['baseUrl'];
            isset($options['lang']) && $this->language = $options['lang'];
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

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function toArray()
    {
        return array(
            'apiKey' => $this->apiKey,
            'secretKey' => $this->secretKey,
            'baseUrl' => $this->baseUrl,
            'language' => $this->language,
        );
    }
}
