<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->paymentReporting()->retrievePaymentTransactions(1);

print_r($response);
