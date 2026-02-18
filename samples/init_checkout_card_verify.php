<?php

require_once('config/sample_config.php');

use Craftgate\Model\CardVerificationAuthType;
use Craftgate\Model\Currency;

$request = array(
    'verificationPrice' => 10,
    'currency' => Currency::TL,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'callbackUrl' => 'https://www.your-website.com/craftgate-checkout-card-verify-callback',
    'paymentAuthenticationType' => CardVerificationAuthType::NON_THREE_DS
);

$response = SampleConfig::craftgate()->payment()->initCheckoutCardVerify($request);

print_r($response);
