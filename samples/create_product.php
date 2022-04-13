<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;

$request = array(
    'name' => "A new Product",
    'channel' => "API",
    'price' => 10,
    'currency' => Currency::TL,
    'enabledInstallments' => "1,2,3,6"
);

$response = SampleConfig::craftgate()->payByLink()->createProduct($request);

print_r($response);
