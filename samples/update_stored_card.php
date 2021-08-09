<?php

require_once('config/sample_config.php');

$request = array(
    'cardUserKey' => 'fac377f2-ab15-4696-88d2-5e71b27ec378',
    'cardToken' => '11a078c4-3c32-4796-90b1-51ee5517a212',
    'expireYear' => '2044',
    'expireMonth' => '07',
);

$response = SampleConfig::craftgate()->payment()->updateCard($request);

print_r($response);
