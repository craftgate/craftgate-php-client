<?php

require_once('config/sample_config.php');

$request = array(
    'cardUserKey' => '8373c41d-711e-4ef6-b5b9-bf669ccab819',
    'cardToken' => '307820ad-c096-4ad1-a122-7092a9665ebd',
    'expireYear' => '2025',
    'expireMonth' => '12',
);

$response = SampleConfig::craftgate()->payment()->updateCard($request);

print_r($response);
