<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;

$request = array(
    'negativeAmountLimit' => 0,
    'currency' => Currency::TL
);

$response = SampleConfig::craftgate()->wallet()->createMemberWallet(1, $request);

print_r($response);
