<?php

use Craftgate\Model\Currency;

require_once('config/sample_config.php');

$request = array(
    'currency' => Currency::TL,
    'page' => 0,
    'size' => 10
);

$response = SampleConfig::craftgate()->merchant()->searchMerchantPos($request);

print_r($response);
