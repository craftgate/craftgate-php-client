<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->bkmExpress()->retrievePayment("dcfdc163-0545-46d7-8f86-5a11718e56ec");

print_r($response);
