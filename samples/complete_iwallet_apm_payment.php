<?php

require_once('config/sample_config.php');

$request = array(
    'paymentId' => 1,
    'additionalParams' => array(
        'otpCode' => '1122'
    )
);

$response = SampleConfig::craftgate()->payment()->completeApmPayment($request);

print_r($response);
