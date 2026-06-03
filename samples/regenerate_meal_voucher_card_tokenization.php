<?php

require_once('config/sample_config.php');

$sessionId = 'session-id';

$request = array(
    'mealVoucherCardTokenizationData' => array(
        'callbackUrl' => 'https://webhook.site/e806070a-da76-4d02-a67b-54ba9e8332d3'
    )
);

$response = SampleConfig::craftgate()->mealVoucherCardTokenization()->regenerate($sessionId, $request);

print_r($response);
