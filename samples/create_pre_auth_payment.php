<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Model\PaymentPhase;
use Craftgate\Util\Guid;

$request = array(
    'price' => 100,
    'paidPrice' => 100,
    'walletPrice' => 0,
    'installment' => 1,
    'currency' => Currency::TL,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'paymentPhase' => PaymentPhase::PRE_AUTH,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'card' => array(
        'cardHolderName' => 'Haluk Demir',
        'cardNumber' => '5258640000000001',
        'expireYear' => '2044',
        'expireMonth' => '07',
        'cvc' => '000'
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
