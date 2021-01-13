<?php

require_once('config/sample_config.php');

$response = FunctionalTestConfig::craftgate()->onboarding()->retrieveSubMerchant(1);

print_r($response);
