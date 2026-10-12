<?php

require_once('config/sample_config.php');

use Craftgate\Model\FraudCheckStatus;

$response = SampleConfig::craftgate()->fraud()->updateFraudChecks(array(
    'id' => 266,
    'checkStatus' => FraudCheckStatus::FRAUD
));

print_r($response);
