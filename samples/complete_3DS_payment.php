<?php

require_once('config/sample_config.php');

$request = array(
    'paymentId' => 1
);

$response = SampleConfig::craftgate()->payment()->complete3DSPayment($request);

print_r($response);
