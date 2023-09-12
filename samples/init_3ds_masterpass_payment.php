<?php

require_once('config/sample_config.php');

$request = array(
    'referenceId' => "referenceId",
    'callbackUrl' => "https://www.your-website.com/craftgate-3DSecure-callback",
);

$response = SampleConfig::craftgate()->masterpass()->init3DSMasterpassPayment($request);

print_r($response);
