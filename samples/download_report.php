<?php
require_once('config/sample_config.php');

$request = array(
    'fileType' => 'CSV' // or XLSX
);

$reportId = '123'; // id returned by createReportFromTemplate
$response = SampleConfig::craftgate()->fileReporting()->downloadReport($request, $reportId);
print_r($response);
