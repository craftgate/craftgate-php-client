<?php

require_once('config/sample_config.php');


$request = array(
    'startDate' => date_create()->modify('-6 days')->format('Y-m-d\TH:i:s'),
    'endDate' => date_create() ->format('Y-m-d\TH:i:s'),
    'reportType' => 'PAYMENT', // or TRANSACTION
    'reportPeriod' => 'INSTANT'
);

$response = SampleConfig::craftgate()->fileReporting()->createReport($request);

print_r($response);
