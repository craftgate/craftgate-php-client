<?php

require_once('config/sample_config.php');

$request = array(
    'paymentTransactionId' => 1, // change it with a valid paymentTransactionId
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'refundPrice' => 20
);

$response = SampleConfig::craftgate()->payment()->refundPaymentTransactionMarkAsRefunded($request);

print_r($response);
