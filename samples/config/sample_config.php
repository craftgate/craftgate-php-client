<?php

require __DIR__ . '/../../autoload.php';

use Craftgate\Craftgate;
use Craftgate\Request\Common\RequestOptions;

class FunctionalTestConfig
{
    public static function craftgate()
    {
        $options = new RequestOptions();
        $options->setApiKey('api-key');
        $options->setSecretKey('secret-key');
        $options->setBaseUrl('https://sandbox-api.craftgate.io');
        return new Craftgate($options);
    }
}
