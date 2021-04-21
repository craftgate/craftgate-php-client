<?php

require_once('config/sample_config.php');

use Craftgate\Model\SettlementType;

$request = array(
    'settlementType' => SettlementType::BOUNCED_SETTLEMENT,
    'startDate' => date_create()->modify('-1 days')->format('Y-m-d\TH:i:s'),
    'endDate' => date_create()->format('Y-m-d\TH:i:s')
);

$response = SampleConfig::craftgate()->settlementReporting()->searchPayoutCompletedTransactions($request);

print_r($response);
