<?php

require_once('config/sample_config.php');

$request = array(
    'paymentId' => 395
);

$response = SampleConfig::craftgate()->fraud()->searchFraudChecks($request);

print_r($response);
