<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentProvider;

$request = array(
    'binNumber' => '525864',
    'price' => 100,
    'currency' => Currency::TL,
    'paymentProvider' => PaymentProvider::MASTERPASS
);

$response = SampleConfig::craftgate()->installment()->searchInstallments($request);

print_r($response);
