<?php

require_once('config/sample_config.php');

$request = array(
    'startDate' => '2020-01-01T00:00:00',
    'endDate' => '2020-01-11T00:00:00'
);

$response = FunctionalTestConfig::craftgate()->settlementReporting()->searchBouncedSubMerchantRows($request);

print_r($response);
