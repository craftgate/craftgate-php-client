<?php

require_once('config/sample_config.php');

use Craftgate\Model\RefundDestinationType;

$request = array(
    'paymentTransactionId' => 1,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'refundPrice' => 20,
    'refundDestinationType' => RefundDestinationType::CARD
);

$response = SampleConfig::craftgate()->payment()->refundPaymentTransaction($request);

print_r($response);
