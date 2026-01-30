<?php

require_once('config/sample_config.php');

$request = array(
    'paymentId' => 1,
    'additionalParams' => array(
        'otpCode' => '784294'
    )
);

$response = SampleConfig::craftgate()->payment()->completeApmPayment($request);

print_r($response);
