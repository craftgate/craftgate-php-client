<?php

require_once('config/sample_config.php');

use Craftgate\Model\FraudCheckStatus;

$response = SampleConfig::craftgate()->fraud()->updateFraudChecks(266, FraudCheckStatus::FRAUD);

print_r($response);
