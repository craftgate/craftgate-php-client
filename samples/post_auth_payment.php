<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Model\PaymentPhase;
use Craftgate\Util\Guid;

$request = array(
    'paymentId' => 1,
    'paidPrice' => 100
);

$response = SampleConfig::craftgate()->payment()->postAuthPayment($request);

print_r($response);
