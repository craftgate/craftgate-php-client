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
    'currency' => Currency::TL,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'card' => array(
        'cardHolderIdentityNumber' => '12345678900',
        'binNumber' => '404308',
        'lastFourDigits' => '0003'
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

$response = SampleConfig::craftgate()->payment()->createPayment($request);

print_r($response);
