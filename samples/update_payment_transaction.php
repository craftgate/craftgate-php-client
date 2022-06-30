<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'subMerchantMemberId' => 1,
    'subMerchantMemberPrice' => 5
);

$response = SampleConfig::craftgate()->payment()->updatePaymentTransaction(10, $request);

print_r($response);
