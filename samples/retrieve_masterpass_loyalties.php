<?php

require_once('config/sample_config.php');

$request = array(
    'cardName' => "YKB Test Kart",
    'msisdn' => "900000000000",
    'binNumber' => "404809",
);

$response = SampleConfig::craftgate()->masterpass()->retrieveLoyalties($request);

print_r($response);
