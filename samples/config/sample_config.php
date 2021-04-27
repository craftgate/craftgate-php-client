<?php

require __DIR__ . '/../../autoload.php';

use Craftgate\Craftgate;

class SampleConfig
{
    public static function craftgate()
    {
        return new Craftgate(array(
            'apiKey' => 'sandbox-gsyZzlcbjmPWbFFplEULUBottBYJUsZb',
            'secretKey' => 'sandbox-UetyUxfOaZNJiMFgUXqCaIRUzSLdCpLZ',
            'baseUrl' => 'https://sandbox-api.craftgate.io',
        ));
    }
}
