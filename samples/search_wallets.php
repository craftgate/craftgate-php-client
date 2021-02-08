<?php

require_once('config/sample_config.php');

$request = array(
    'memberId' => 1
);

$response = SampleConfig::craftgate()->wallet()->searchWallets($request);

print_r($response);
