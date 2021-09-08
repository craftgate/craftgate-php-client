<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->paymentReporting()->retrievePaymentRefunds(1);

print_r($response);
