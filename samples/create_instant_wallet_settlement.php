<?php

require_once('config/sample_config.php');

$request = array(
    'excludedSubMerchantMemberIds' => array()
);

$response = SampleConfig::craftgate()->settlement()->createInstantWalletSettlement($request);

print_r($response);
