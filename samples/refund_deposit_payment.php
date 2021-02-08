<?php

require_once('config/sample_config.php');

$request = array(
    'price' => 50,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5'
);

$response = SampleConfig::craftgate()->payment()->refundDepositPayment(1, $request);

print_r($response);
