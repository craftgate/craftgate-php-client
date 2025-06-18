<?php

require_once('config/sample_config.php');

$paymentId = 1;

$response = SampleConfig::craftgate()->payment()->verifyBnplPayment($paymentId);

print_r($response);