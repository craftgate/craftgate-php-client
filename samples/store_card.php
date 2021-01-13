<?php

require_once('config/sample_config.php');

$request = array(
    'cardHolderName' => 'Haluk Demir',
    'cardNumber' => '5258640000000001',
    'expireYear' => '2044',
    'expireMonth' => '07',
    'cardAlias' => 'My Other Cards'
);

$response = FunctionalTestConfig::craftgate()->payment()->storeCard($request);

print_r($response);
