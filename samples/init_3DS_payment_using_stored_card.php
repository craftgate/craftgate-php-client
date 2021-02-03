<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'price' => 100,
    'paidPrice' => 100,
    'walletPrice' => 0,
    'installment' => 1,
    'currency' => Currency::TRY,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'callbackUrl' => 'https://www.your-website.com/craftgate-3DSecure-callback',
    'card' => array(
        'cardUserKey' => 'fac377f2-ab15-4696-88d2-5e71b27ec378',
        'cardToken' => '11a078c4-3c32-4796-90b1-51ee5517a212'
    ),
    'items' => array(
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 1',
            'price' => 30
        ),
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 2',
            'price' => 50
        ),
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 3',
            'price' => 20
        )
    )
);

$response = FunctionalTestConfig::craftgate()->payment()->init3DSPayment($request);

print_r($response);
