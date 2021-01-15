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
        $options->setApiKey('sandbox-wdpjblkwseePGqYFkFzQtvKPGsKNvtfo');
        $options->setSecretKey('sandbox-lXXDXSMwlskgePfZJhWrhjzaZkvTudjS');
        $options->setBaseUrl('https://sandbox-api.craftgate.io');
        return new Craftgate($options);
    }
}
