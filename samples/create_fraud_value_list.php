<?php

use Craftgate\Model\FraudValueType;

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->createValueList("ipList", FraudValueType::IP);

print_r($response);
