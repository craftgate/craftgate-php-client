<?php

require_once('config/sample_config.php');

$sessionId = 'session-id';

$request = array(
    'mealVoucherCardTokenizationData' => array(
        'callbackUrl' => 'https://www.yourdomain.com/callback'
    )
);

$response = SampleConfig::craftgate()->mealVoucherCardTokenization()->regenerate(session-id, $request);

print_r($response);
