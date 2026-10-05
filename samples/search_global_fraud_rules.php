<?php

require_once('config/sample_config.php');

$request = array(
    "scope" => "GLOBAL"
);

$response = SampleConfig::craftgate()->fraud()->searchFraudRules($request);

print_r($response);
