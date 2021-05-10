<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\RefundStatus;

$request = array(
    'page' => 0,
    'size' => 3,
    'id' => 1,
    'paymentId' => 1,
    'paymentTransactionId' => 1,
    'buyerMemberId' => 1,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'status' => RefundStatus::SUCCESS,
    'currency' => Currency::TL,
    'minRefundPrice' => 5,
    'maxRefundPrice' => 10,
    'isAfterSettlement' => false,
    'minCreatedDate' => date_create()->modify('-4 days')->format('Y-m-d\TH:i:s'),
    'maxCreatedDate' => date_create()->format('Y-m-d\TH:i:s')
);

$response = SampleConfig::craftgate()->paymentReporting()->searchPaymentTransactionRefunds($request);

print_r($response);
