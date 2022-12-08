<?php

require_once('config/sample_config.php');

$merchantHookKey = "Aoh7tReTybO6wOjBmOJFFsOR53SBojEp";
$incomingSignature = "0wRB5XqWJxwwPbn5Z9TcbHh8EGYFufSYTsRMB74N094=";

$webhookData = array(
    'eventType' => 'API_VERIFY_AND_AUTH',
    'eventTimestamp' => 1661521221,
    'status' => "SUCCESS",
    'payloadId' => '584'
);

$isVerified = SampleConfig::craftgate()->hook()->isWebhookVerified($merchantHookKey,$incomingSignature, $webhookData);

print_r($isVerified);
