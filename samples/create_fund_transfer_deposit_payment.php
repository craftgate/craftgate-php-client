<?php

require_once('config/sample_config.php');

$request = array(
    'price' => 100,
    'buyerMemberId' => 1,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5'
);

$response = SampleConfig::craftgate()->payment()->createFundTransferDepositPayment($request);

print_r($response);
