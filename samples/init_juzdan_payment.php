<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Model\PaymentPhase;
use Craftgate\Model\ClientType;
use Craftgate\Util\Guid;

$request = array(
    'price' => 100,
    'paidPrice' => 100,
    'currency' => Currency::TL,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'externalId' => 'testExternalId',
    'callbackUrl' => 'www.testCallbackUrl.com',
    'paymentPhase' => PaymentPhase::PRE_AUTH,
    'paymentChannel' => 'testPaymentChannel',
    'buyerMemberId' => 1,
    'bankOrderId' => 'testBankOrderId',
    'items' => array(
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 1',
            'price' => 30,
            'subMerchantMemberId' => 1,
            'subMerchantMemberPrice' => 27
        ),
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 2',
            'price' => 50,
            'subMerchantMemberId' => 2,
            'subMerchantMemberPrice' => 27
        ),
        array(
            'externalId' => Guid::generate(),
            'name' => 'Item 3',
            'price' => 20,
            'subMerchantMemberId' => 3,
            'subMerchantMemberPrice' => 27
        )
    ),
    'clientType' => ClientType::W,
    'loanCampaignId' => 1
);

$response = SampleConfig::craftgate()->juzdan()-> initJuzdanPayment($request);

print_r($response);
