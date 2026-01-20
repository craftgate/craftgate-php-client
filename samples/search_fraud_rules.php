<?php

require_once('config/sample_config.php');

use Craftgate\Model\FraudAction;

$request = array(
    "action" => FraudAction::REVIEW
);

$response = SampleConfig::craftgate()->fraud()->searchFraudRules($request);

print_r($response);
