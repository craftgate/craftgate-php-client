<?php

require_once('config/sample_config.php');

$request = array(
    'negativeAmountLimit' => -10
);

$response = SampleConfig::craftgate()->wallet()->updateMemberWallet(1, 1, $request);

print_r($response);
