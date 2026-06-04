<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;

$request = array(
    'apmType' => ApmType::SETCARD,
    'mealVoucherCardTokenizationData' => array(
        'callbackUrl' => 'https://www.yourdomain.com/callback'
    )
);

$response = SampleConfig::craftgate()->mealVoucherCardTokenization()->init($request);

print_r($response);
