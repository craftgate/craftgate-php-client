<?php

require_once('config/sample_config.php');

use Craftgate\Model\RemittanceReasonType;

$request = array(
    'memberId' => 1,
    'price' => 50,
    'description' => 'Remittance received from memberId 1',
    'remittanceReasonType' => RemittanceReasonType::REMITTANCE
);

$response = FunctionalTestConfig::craftgate()->wallet()->receiveRemittance($request);

print_r($response);
