<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Model\PosApmPaymentProvider;
use Craftgate\Util\Guid;

$request = array(
    'price' => 100,
    'paidPrice' => 100,
    'currency' => Currency::TL,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'conversationId' => '456d1297-908e-4bd6',
    'paymentProvider' => PosApmPaymentProvider::YKB_WORLD_PAY,
    'callbackUrl' => 'https://www.your-website.com/craftgate-pos-apm-callback',
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
    ),
    'additionalParams' => array(
        'sourceCode' => "WEB2QR",
    )
);

$response = SampleConfig::craftgate()->payment()->initPosApmPayment($request);

print_r($response);
