<?php

require_once('config/sample_config.php');

$request = array(
    'cardNumber' => '5482370000000003',
    'expireYear' => '2044',
    'expireMonth' => '07',
    'cvc' => '000',
    'clientIp' => '127.0.0.1',
    'installment' => 2,
    'type' => LoyaltyType::ADDITIONAL_INSTALLMENT,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'fraudParams' => array(
        'buyerEmail' => 'buyer@email.com',
        'buyerPhoneNumber' => '905555555555',
        'buyerExternalId' => 'buyerExternalId444',
        'customFraudVariable' => 'sessionId213123',
    )
);

$response = SampleConfig::craftgate()->payment()->retrieveLoyalties($request);

print_r($response);
