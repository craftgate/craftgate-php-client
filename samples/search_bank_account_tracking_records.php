<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;

$request = array(
    'page' => 0,
    'size' => 10,
    'currency' => Currency::TL
);

$response = SampleConfig::craftgate()->bankAccountTracking()->searchRecords($request);

print_r($response);
