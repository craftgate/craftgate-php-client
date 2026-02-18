<?php

require_once('config/sample_config.php');

use Craftgate\Model\CardVerificationAuthType;
use Craftgate\Model\Currency;

$request = array(
    'card' => array(
        'cardHolderName' => 'Haluk Demir',
        'cardNumber' => '5258640000000001',
        'expireYear' => '2044',
        'expireMonth' => '07',
        'cvc' => '000',
        'cardAlias' => 'My YKB Card'
    ),
    'paymentAuthenticationType' => CardVerificationAuthType::THREE_DS,
    'callbackUrl' => 'https://www.your-website.com/craftgate-3DSecure-card-verify-callback',
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'verificationPrice' => 10,
    'currency' => Currency::TL,
    'clientIp' => '127.0.0.1'
);

$response = SampleConfig::craftgate()->payment()->verifyCard($request);

print_r($response);
