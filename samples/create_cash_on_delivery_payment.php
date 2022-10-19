<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;
use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'apmType' => ApmType::CASH_ON_DELIVERY,
    'price' => 100,
    'paidPrice' => 100,
    'currency' => Currency::TL,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'conversationId' => '241cf73c-7ef1-4e29-a6cc-f37905f2fc3d',
    'externalId' => 'optional-externalId',
    'items' => array(
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 1',
            'price' => 40
        ),
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 2',
            'price' => 60
        )
    )
);

$response = SampleConfig::craftgate()->payment()->createApmPayment($request);

print_r($response);
