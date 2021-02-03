<?php

require __DIR__ . '/../../autoload.php';

use Craftgate\Options;
use Craftgate\Craftgate;

class FunctionalTestConfig
{
    public static function craftgate()
    {
        $options = new Options(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'https://sandbox-api.craftgate.io',
        ));

        return new Craftgate($options);
    }
}
