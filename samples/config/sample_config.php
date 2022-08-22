<?php

require __DIR__ . '/../../autoload.php';

use Craftgate\Craftgate;

class SampleConfig
{
    public static function craftgate()
    {
        return new Craftgate(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'https://sandbox-api.craftgate.io',
            'lang' => 'en',
        ));
    }
}
