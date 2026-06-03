<?php

require_once('config/sample_config.php');

$sessionId = '8340ef48-faad-475c-9185-3f5381623e2f';

$request = array(
    'validationCode' => '412289'
);

$response = SampleConfig::craftgate()->mealVoucherCardTokenization()->complete($sessionId, $request);

print_r($response);
