<?php

require_once('config/sample_config.php');

$request = array(
    'referenceId' => "referenceId",
    'token' => "token",
);

$response = SampleConfig::craftgate()->masterpass()->completeMasterpassPayment($request);

print_r($response);
