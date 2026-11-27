<?php

require_once('config/sample_config.php');

$request = array(
    'subMerchantMemberId' => 1,
    'subMerchantMemberPrice' => 5
);

$response = SampleConfig::craftgate()->settlement()->updatePaymentTransaction(10, $request);

print_r($response);
