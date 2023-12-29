<?php

use Craftgate\Model\FraudValueType;

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->addValueToValueList(array(
    'listName' => "ipList",
    'type' => FraudValueType::IP,
    'label' => "local ip 1",
    'value' => "127.0.0.1",
));

print_r($response);
