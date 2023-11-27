<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;
use Craftgate\Model\BnplCartItemType;
use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'price' => 100,
    'paidPrice' => 100,
    'currency' => Currency::TL,
    'apmType' => ApmType::TOM_FINANCE,
    'apmOrderId' => Guid::generate(),
    'paymentGroup' => PaymentGroup::PRODUCT,
    'externalId' => Guid::generate(),
    'conversationId' => 'conversationId',
    'callbackUrl' => 'https://www.your-website.com/callback',
    'additionalParams' => array(
        'buyerName' => "John Doe",
        'buyerPhoneNumber' => "5553332211",
    ),
    'items' => array(
        array(
            'externalId' => 'externalId',
            'name' => 'Item 1',
            'price' => 100,
        )
    ),
    'cartItems' => array(
        array(
            'id' => '26020874',
            'name' => 'Test 1',
            'brandName' => '26010303',
            'type' => BnplCartItemType::OTHER,
            'unitPrice' => 100,
            'quantity' => 1,
        )
    )
);

$response = SampleConfig::craftgate()->payment()->initBnplPayment($request);

print_r($response);