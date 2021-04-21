<?php

require_once('config/sample_config.php');

$request = array(
    'startDate' => date_create()->modify('-1 days')->format('Y-m-d\TH:i:s'),
    'endDate' => date_create()->format('Y-m-d\TH:i:s')
);

$response = SampleConfig::craftgate()->settlementReporting()->searchBouncedPayoutTransactions($request);

print_r($response);
