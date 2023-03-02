<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->wallet()->retrieveRefundWalletTransactions(1);

print_r($response);
