,<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;

$request = array(
    'price' => 100,
    'paidPrice' => 100,
    'currency' => Currency::TL,
    'paymentGroup' => PaymentGroup::PRODUCT,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'callbackUrl' => 'https://www.your-website.com/craftgate-checkout-callback',
    'depositPayment' => true
);

$response = SampleConfig::craftgate()->payment()->initCheckoutPayment($request);

print_r($response);
