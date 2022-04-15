<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;

$request = array(
    'name' => "A new Product",
    'channel' => "API",
    'currency' => Currency::TL
);

$response = SampleConfig::craftgate()->payByLink()->searchProducts($request);

print_r($response);
