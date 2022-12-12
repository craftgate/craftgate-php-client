<?php

require_once('config/sample_config.php');

$merchantThreeDsCallbackKey = "merchantThreeDsCallbackKeySndbox";
$params = array(
    'hash' => '1d3fa1e51fe7c350185c5a7f8c3ff513a991367b08c16a56f4ab9abeb738a1e1',
    'paymentId' => '5',
    'conversationData' => 'conversation-data',
    'conversationId' => 'conversation-id',
    'status' => 'SUCCESS',
    'completeStatus' => 'WAITING'
);

$isVerified = SampleConfig::craftgate()->payment()->is3DSecureCallbackVerified($merchantThreeDsCallbackKey, $params);

print_r($isVerified);
