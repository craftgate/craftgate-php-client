<?php

use Craftgate\Model\FileStatus;

require_once('config/sample_config.php');

$request = array(
    'page' => 0,
    'size' => 10,
    'fileStatus' => FileStatus::CREATED,
    'startDate' => date_create()->modify('-4 days')->format('Y-m-d\TH:i:s'),
    'endDate' => date_create()->format('Y-m-d\TH:i:s')
);

$response = SampleConfig::craftgate()->settlementReporting()->searchPayoutRows($request);

print_r($response);
