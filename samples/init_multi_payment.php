<?php

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Model\PaymentPhase;
use Craftgate\Util\Guid;

require_once('config/sample_config.php');

$request = array(
    'price' => 100,
    'paidPrice' => 100,
    'callbackUrl' => 'callbackUrl',
    'currency' => Currency::TL,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'externalId' => Guid::generate(),
    'paymentGroup' => PaymentGroup::PRODUCT,
    'paymentPhase' => PaymentPhase::AUTH,
    'items' => array(
        array(
            'name' => 'Item 1',
            'externalId' => '38983903',
            'price' => 60,
        ),
        array(
            'name' => 'Item 2',
            'externalId' => '92983294',
            'price' => 40,
        )
    )
);

$response = SampleConfig::craftgate()->payment()->initMultiPayment($request);

print_r($response);
