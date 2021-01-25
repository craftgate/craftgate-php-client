<?php

require_once('config/sample_config.php');

$response = FunctionalTestConfig::craftgate()->payment()->retrieveCheckoutPayment("d2c47011-8b93-4308-beda-38075d739a64");

print_r($response);
