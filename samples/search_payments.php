<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentStatus;
use Craftgate\Model\PaymentType;

$request = array(
    'page' => 0,
    'size' => 3,
    'paymentId' => 1,
    'paymentTransactionId' => 1,
    'subMerchantMemberId' => 1,
    'buyerMemberId' => 1,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'orderId' => '20210329101111046AyfWLxk',
    'paymentType' => PaymentType::CARD_PAYMENT,
    'paymentStatus' => PaymentStatus::SUCCESS,
    'binNumber' => '525864',
    'lastFourDigits' => '0001',
    'currency' => Currency::TL,
    'minPaidPrice' => 5,
    'maxPaidPrice' => 10,
    'installment' => 1,
    'isThreeDS' => false,
    'minCreatedDate' => date_create()->modify('-4 days')->format('Y-m-d\TH:i:s'),
    'maxCreatedDate' => date_create()->format('Y-m-d\TH:i:s')
);

$response = SampleConfig::craftgate()->paymentReporting()->searchPayments($request);

print_r($response);
