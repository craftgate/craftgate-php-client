<?php

use Craftgate\Model\Currency;

require_once('config/sample_config.php');

$request = array(
    'buyerMemberId' => 1,
    'price' => 100,
    'currency' => Currency::TL,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'card' => array(
        'cardHolderName' => 'Haluk Demir',
        'cardNumber' => '5258640000000001',
        'expireYear' => '2044',
        'expireMonth' => '07',
        'cvc' => '000'
    )
);

$response = SampleConfig::craftgate()->payment()->createDepositPayment($request);

print_r($response);
