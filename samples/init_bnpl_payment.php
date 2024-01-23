<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;
use Craftgate\Model\BnplCartItemType;
use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'price' => 10000,
    'paidPrice' => 10000,
    'currency' => Currency::TL,
    'apmType' => ApmType::MASLAK,
    'apmOrderId' => Guid::generate(),
    'paymentGroup' => PaymentGroup::PRODUCT,
    'externalId' => Guid::generate(),
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'callbackUrl' => 'callbackUrl',
    'bankCode' => '103',
    'items' => array(
        array(
            'externalId' => '38983903',
            'name' => 'Item 1',
            'price' => 6000,
        ),
        array(
            'externalId' => '92983294',
            'name' => 'Item 2',
            'price' => 4000,
        )
    ),
    'cartItems' => array(
        array(
            'id' => '200',
            'name' => 'Test Elektronik 2',
            'brandName' => 'iphone',
            'type' => BnplCartItemType::OTHER,
            'unitPrice' => 3000,
            'quantity' => 2,
        ),
        array(
            'id' => '100',
            'name' => 'Test Elektronik 1',
            'brandName' => 'Samsung',
            'type' => BnplCartItemType::MOBILE_PHONE_PRICE_ABOVE_REGULATION_LIMIT,
            'unitPrice' => 4000,
            'quantity' => 1,
        )
    )
);

$response = SampleConfig::craftgate()->payment()->initBnplPayment($request);

print_r($response);