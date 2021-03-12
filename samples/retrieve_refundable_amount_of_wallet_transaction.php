<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->wallet()->retrieveRefundableAmountOfWalletTransaction(1);

print_r($response);
