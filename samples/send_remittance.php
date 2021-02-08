<?php

require_once('config/sample_config.php');

use Craftgate\Model\RemittanceReasonType;

$request = array(
    'memberId' => 1,
    'price' => 50,
    'description' => 'Remittance send to memberId 1',
    'remittanceReasonType' => RemittanceReasonType::REMITTANCE
);

$response = SampleConfig::craftgate()->wallet()->sendRemittance($request);

print_r($response);
