<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;
use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'apmType' => ApmType::PAYCELL_DCB,
    'price' => 1,
    'paidPrice' => 1,
    'currency' => Currency::TL,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'conversationId' => 'conversationId',
    'externalId' => 'externalId',
    'callbackUrl' => 'callback',
    'items' => array(
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 1',
            'price' => 0.40
        ),
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 2',
            'price' => 0.60
        )
    ),
    'additionalParams' => array(
            'paycellGsmNumber' => "5305289290",
    )
);

$response = SampleConfig::craftgate()->payment()->initApmPayment($request);

print_r($response);
