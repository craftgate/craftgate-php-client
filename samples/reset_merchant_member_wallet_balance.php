<?php

require_once('config/sample_config.php');

$request = array(
    'walletAmount' => -100
);

$response = SampleConfig::craftgate()->wallet()->resetMerchantMemberWalletBalance($request);

print_r($response);
