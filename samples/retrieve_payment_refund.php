<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->payment()->retrievePaymentRefund(1);

print_r($response);
