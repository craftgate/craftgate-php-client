<?php

require_once('config/sample_config.php');

$sessionId = '$sessionId';

$request = array(
    'validationCode' => '111111'
);

$response = SampleConfig::craftgate()->mealVoucherCardTokenization()->complete($sessionId, $request);

print_r($response);
