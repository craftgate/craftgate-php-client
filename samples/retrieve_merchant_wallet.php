<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->wallet()->retrieveMerchantMemberWallet();

print_r($response);
