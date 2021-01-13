<?php

require_once('config/sample_config.php');

$request = array(
    'memberIds' => array(1, 2),
    'name' => 'Zeytinyağı Üretim'
);

$response = FunctionalTestConfig::craftgate()->onboarding()->searchMembers($request);

print_r($response);
