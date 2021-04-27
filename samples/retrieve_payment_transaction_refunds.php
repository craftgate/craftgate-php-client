<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->paymentReporting()->retrievePaymentTransactionRefunds(1, 1);

print_r($response);
