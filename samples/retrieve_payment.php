<?php

require_once('config/sample_config.php');

$response = FunctionalTestConfig::craftgate()->payment()->retrievePayment(1);

print_r($response);
