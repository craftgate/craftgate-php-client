<?php

use Craftgate\Model\FraudValueType;

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->addValueToValueList(array(
    'listName' => "ipList",
    'label' => "local ip 2",
    'type' => FraudValueType::IP,
    'value' => "127.0.0.2",
    'durationInSeconds' => 60
));

print_r($response);
