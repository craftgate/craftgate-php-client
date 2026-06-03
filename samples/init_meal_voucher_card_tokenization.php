<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;

$request = array(
    'apmType' => ApmType::SETCARD,
    'mealVoucherCardTokenizationData' => array(
        'callbackUrl' => 'https://webhook.site/e806070a-da76-4d02-a67b-54ba9e8332d3'
    )
);

$response = SampleConfig::craftgate()->mealVoucherCardTokenization()->init($request);

print_r($response);
