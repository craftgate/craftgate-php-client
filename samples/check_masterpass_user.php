<?php

require_once('config/sample_config.php');

$request = array(
    'masterpassGsmNumber' => '903000000000',
);

$response = SampleConfig::craftgate()->masterpass()->checkMasterpassUser($request);

print_r($response);
