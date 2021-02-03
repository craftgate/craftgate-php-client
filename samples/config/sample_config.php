<?php

require __DIR__ . '/../../autoload.php';

use Craftgate\Client;

class FunctionalTestConfig
{
    public static function craftgate()
    {
        return new Client(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'https://sandbox-api.craftgate.io',
        ));
    }
}
