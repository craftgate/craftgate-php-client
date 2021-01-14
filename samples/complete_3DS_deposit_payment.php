<?php

require_once('config/sample_config.php');

$request = array(
    'paymentId' => 1
);

$response = FunctionalTestConfig::craftgate()->payment()->complete3DSDepositPayment($request);

print_r($response);
