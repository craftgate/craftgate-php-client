<?php

require __DIR__ . '/../../autoload.php';

use Craftgate\Craftgate;

class SampleConfig
{
    public static function craftgate()
    {
        return new Craftgate(array(
            'apiKey' => 'api-key-2',
            'secretKey' => 'secret-key',
            'baseUrl' => 'http://localhost:8000'
        ));
    }
}
