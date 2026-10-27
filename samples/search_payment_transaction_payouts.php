<?php

require_once('config/sample_config.php');

$request = array(
    'paymentTransactionIds' => implode(',', array(1, 2))
);

$response = SampleConfig::craftgate()->settlementReporting()->searchPaymentTransactionPayouts($request);

print_r($response);
