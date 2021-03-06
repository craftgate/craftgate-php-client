<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;

$request = array(
    'price' => 100,
    'buyerMemberId' => 1,
    'currency' => Currency::TL,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'callbackUrl' => 'https://www.your-website.com/craftgate-3DSecure-callback',
    'card' => array(
        'cardHolderName' => 'Haluk Demir',
        'cardNumber' => '5258640000000001',
        'expireYear' => '2044',
        'expireMonth' => '07',
        'cvc' => '000'
    )
);

$response = SampleConfig::craftgate()->payment()->init3DSDepositPayment($request);

print_r($response);
