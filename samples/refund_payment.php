<?php

require_once('config/sample_config.php');

use Craftgate\Model\RefundDestinationType;

$request = array(
    'paymentId' => 1,
    'refundDestinationType' => RefundDestinationType::PROVIDER
);

$response = SampleConfig::craftgate()->payment()->refundPayment($request);

print_r($response);
