<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentStatus;
use Craftgate\Model\PaymentType;

$request = array(
    'reportDate' => date_create()->format('Y-m-d'),
    'fileType' => 'xlsx'
);

$response = SampleConfig::craftgate()->fileReporting()->retrieveDailyTransactionReport($request);
file_put_contents('/tmp/report-php.xlsx', $response);