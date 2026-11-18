<?php

require_once('config/sample_config.php');

use Craftgate\Request\ReportFilter;

$startDate = date_create()->modify('-2 days');
$endDate = date_create();

$request = array(
    'filters' => array(
        ReportFilter::reportDate($startDate, $endDate)
    ),
    'fileFormats' => array('CSV')
);

$response = SampleConfig::craftgate()->fileReporting()->createReportFromTemplate(1, $request);

print_r($response);
