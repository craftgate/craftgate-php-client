<?php

use Craftgate\Model\Currency;

require_once('config/sample_config.php');

$request = array(
    'page' => 0,
    'size' => 10,
    "currency" => Currency::TL
);

$response = SampleConfig::craftgate()->bankAccountTracking()->searchRecords($request);

print_r($response);
