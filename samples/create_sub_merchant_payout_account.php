<?php

require_once('config/sample_config.php');

use Craftgate\Model\AccountOwner;
use Craftgate\Model\Currency;
use Craftgate\Model\PayoutAccountType;

$request = array(
    'type' => PayoutAccountType::WISE,
    'externalAccountId' => "wiseRecipientId",
    'currency' => Currency::USD,
    'accountOwner' => AccountOwner::SUB_MERCHANT_MEMBER,
    'subMerchantMemberId' => 1
);

$response = SampleConfig::craftgate()->settlement()->createPayoutAccount($request);

print_r($response);
