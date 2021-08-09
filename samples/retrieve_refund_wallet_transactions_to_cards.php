<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->wallet()->retrieveRefundWalletTransactionsToCard(1);

print_r($response);
