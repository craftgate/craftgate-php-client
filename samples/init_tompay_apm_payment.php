<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;
use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'apmType' => ApmType::TOMPAY,
    'price' => 1,
    'paidPrice' => 1,
    'currency' => Currency::TL,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'conversationId' => 'conversationId',
    'externalId' => 'externalId',
    'callbackUrl' => 'https://www.your-website.com/craftgate-apm-callback',
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
        'channel' => 'channel',
        'phone' => '5001112233'
    )
);

$response = SampleConfig::craftgate()->payment()->initApmPayment($request);

print_r($response);
