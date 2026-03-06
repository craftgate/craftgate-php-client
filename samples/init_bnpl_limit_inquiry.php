<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;

$request = array(
    'apmType' => ApmType::ZIP,
    'additionalParams' => array(
        'buyerPhoneNumber' => '5320000000',
        'buyerIdentityNumber' => '11111111110',
        'buyerBirthdate' => '1990-01-01',
    )
);

$response = SampleConfig::craftgate()->payment()->initBnplLimitInquiry($request);

print_r($response);