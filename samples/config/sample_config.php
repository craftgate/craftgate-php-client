<?php

require_once(dirname(__DIR__) . '/../CraftgateBootstrap.php');

CraftgateBootstrap::init();

use Craftgate\Request\Common\RequestOptions;
use Craftgate\TokenPay;

class FunctionalTestConfig
{
    public static function craftgate()
    {
        $options = new RequestOptions();
        $options->setApiKey('api-key');
        $options->setSecretKey('secret-key');
        $options->setBaseUrl('http://api-gateway.craftgate.com.tr');
        return new TokenPay($options);
    }
}
