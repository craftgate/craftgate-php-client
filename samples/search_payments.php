<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentStatus;

$request = array(
    'paymentStatus' => PaymentStatus::SUCCESS,
    'currency' => Currency::TL
);

$response = FunctionalTestConfig::craftgate()->payment()->searchPayments($request);

print_r($response);
