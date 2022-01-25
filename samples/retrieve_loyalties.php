<?php

require_once('config/sample_config.php');

$request = array(
    'cardNumber' => '4043080000000003',
    'expireYear' => '2044',
    'expireMonth' => '07',
    'cvc' => '000'
);

$response = SampleConfig::craftgate()->payment()->retrieveLoyalties($request);

print_r($response);
