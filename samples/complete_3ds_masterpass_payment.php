<?php

require_once('config/sample_config.php');

$request = array(
    'paymentId' => 1,
);

$response = SampleConfig::craftgate()->masterpass()->complete3DSMasterpassPayment($request);

print_r($response);
