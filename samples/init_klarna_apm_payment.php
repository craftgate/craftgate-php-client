<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;
use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'apmType' => ApmType::KLARNA,
    'price' => 1,
    'paidPrice' => 1,
    'currency' => Currency::EUR,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
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
        'country' => "de",
        'locale' => "en-DE",
    )
);

$response = SampleConfig::craftgate()->payment()->initApmPayment($request);

print_r($response);
