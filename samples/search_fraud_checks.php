<?php

require_once('config/sample_config.php');

use Craftgate\Model\FraudAction;
use Craftgate\Model\FraudCheckStatus;

$request = array(
    'minCreatedDate' => date_create()->modify('-1 days')->format('Y-m-d\TH:i:s'),
    'maxCreatedDate' => date_create()->format('Y-m-d\TH:i:s'),
    "action" => FraudAction::REVIEW,
    "checkStatus" => FraudCheckStatus::WAITING
);

$response = SampleConfig::craftgate()->fraud()->searchFraudChecks($request);

print_r($response);
