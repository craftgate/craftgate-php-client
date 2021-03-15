<?php

require_once('config/sample_config.php');

$request = array(
    'refundPrice' => 10,
);

$response = SampleConfig::craftgate()->wallet()->refundWalletTransactionToCard(1, $request);

print_r($response);
