<?php

require_once('config/sample_config.php');

use Craftgate\Model\PayoutStatus;

$request = array(
    'page' => 0,
    'size' => 25,
    'minWithdrawPrice' => 5,
    'maxWithdrawPrice' => 1000,
    'payout' => PayoutStatus::WAITING_FOR_PAYOUT
);

$response = SampleConfig::craftgate()->wallet()->searchWithdraws($request);

print_r($response);
