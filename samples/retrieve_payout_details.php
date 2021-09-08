<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->settlementReporting()->retrievePayoutDetails(1);

print_r($response);
