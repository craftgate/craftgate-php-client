<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\RemittanceReasonType;

$request = array(
    'memberId' => 1,
    'price' => 50,
    'currency' => Currency::TL,
    'description' => 'Loyalty send to memberId 1',
    'remittanceReasonType' => RemittanceReasonType::REDEEM_ONLY_LOYALTY
);

$response = SampleConfig::craftgate()->wallet()->sendRemittance($request);

print_r($response);
