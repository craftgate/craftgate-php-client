<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->addCardFingerprintToValueList("cardList", array(
    'label' => "John Doe's Card",
    'operation' => "PAYMENT",
    'operationId' => "12420", //paymentId
    'durationInSeconds' => 60,
));

print_r($response);
