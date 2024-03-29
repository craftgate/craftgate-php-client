<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Model\PaymentPhase;
use Craftgate\Util\Guid;

$request = array(
    'userId' => "masterpass-user-id",
    'msisdn' => "900000000000",
    'binNumber' => "404308",
    'forceThreeDS' => false,
    'createPayment' => array(
        'price' => 100,
        'paidPrice' => 100,
        'installment' => 1,
        'currency' => Currency::TL,
        'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
        'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
        'paymentPhase' => PaymentPhase::AUTH,
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
    )
);

$response = SampleConfig::craftgate()->masterpass()->generateMasterpassPaymentToken($request);

print_r($response);
