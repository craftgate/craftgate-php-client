<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;

$request = array(
    'apmType' => ApmType::ZIP,
    'additionalParams' => array(
        'buyerPhoneNumber' => '5320000000',
        'otpCode' => '123456'
    )
);

$response = SampleConfig::craftgate()->payment()->bnplLimitInquiry($request);

print_r($response);