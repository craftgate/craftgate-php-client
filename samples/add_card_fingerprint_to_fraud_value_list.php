<?php

use Craftgate\Model\FraudValueType;

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->addValueToValueList(array(
    'listName' => "cardList",
    'type' => FraudValueType::CARD,
    'label' => "John Doe's Card",
    'paymentId' => 11675,
));

print_r($response);
