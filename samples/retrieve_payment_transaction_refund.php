<?php

require_once('config/sample_config.php');

$response = FunctionalTestConfig::craftgate()->payment()->retrievePaymentTransactionRefund(1);

print_r($response);
