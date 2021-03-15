<?php

require_once('config/sample_config.php');

use Craftgate\Model\RemittanceReasonType;

$request = array(
    'memberId' => 1,
    'price' => 50,
    'description' => 'Loyalty received from memberId 1',
    'remittanceReasonType' => RemittanceReasonType::REDEEM_ONLY_LOYALTY
);

$response = SampleConfig::craftgate()->wallet()->receiveRemittance($request);

print_r($response);
