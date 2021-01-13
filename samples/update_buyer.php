<?php

require_once('config/sample_config.php');

$request = array(
    'name' => 'Haluk',
    'surname' => 'Demir',
    'email' => 'haluk.demir@example.com',
    'identityNumber' => '11111111110',
    'gsmNumber' => '905551111111',
    'buyerExternalId' => uniqid()
);

$response = FunctionalTestConfig::craftgate()->onboarding()->updateBuyer(1, $request);

print_r($response);
