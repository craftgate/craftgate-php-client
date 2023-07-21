<?php

require_once('config/sample_config.php');

use Craftgate\Model\AccountOwner;
use Craftgate\Model\Currency;
use Craftgate\Model\PayoutAccountType;

$request = array(
    'type' => PayoutAccountType::WISE,
    'externalAccountId' => "wiseRecipientId",
    'currency' => Currency::USD,
    'accountOwner' => AccountOwner::MERCHANT,
);

$response = SampleConfig::craftgate()->settlement()->createPayoutAccount($request);

print_r($response);
