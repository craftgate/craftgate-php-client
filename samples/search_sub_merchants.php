<?php

require_once('config/sample_config.php');

$request = array(
    'subMerchantIds' => array(1, 2),
    'name' => 'Zeytinyağı Üretim'
);

$response = FunctionalTestConfig::craftgate()->onboarding()->searchSubMerchants($request);

print_r($response);
