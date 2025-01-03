<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->bkmExpress()->retrievePaymentByToken("23f4e147-2c4e-4a2c-8a67-9c783d813b79");

print_r($response);
