<?php

require __DIR__ . '/../../autoload.php';

use Craftgate\Craftgate;
use Craftgate\Request\Common\RequestOptions;

class FunctionalTestConfig
{
    public static function craftgate()
    {
        $options = new RequestOptions(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'https://sandbox-api.craftgate.io',
        ));

        return new Craftgate($options);
    }
}
