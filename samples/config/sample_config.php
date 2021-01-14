<?php

require_once(dirname(__DIR__) . '/../CraftgateBootstrap.php');

CraftgateBootstrap::init();

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
