<?php
require_once('config/sample_config.php');

$request = array(
    'fileType' => 'CSV' // or XLSX
);

$reportId = '25';
$response = SampleConfig::craftgate()->fileReporting()->retrieveReport($request, $reportId);
print_r($response);