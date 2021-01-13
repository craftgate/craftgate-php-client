<?php

require_once('config/sample_config.php');

$response = FunctionalTestConfig::craftgate()->payment()->retrieveCheckoutPayment("fe4b0c2d-3c48-4553-9429-695d204bd7c1");

print_r($response);
