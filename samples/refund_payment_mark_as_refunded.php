<?php

require_once('config/sample_config.php');

$request = array(
    'paymentId' => 1, // change it with a valid paymentId
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5'
);

$response = SampleConfig::craftgate()->payment()->refundPaymentMarkAsRefunded($request);

print_r($response);
