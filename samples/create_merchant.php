<?php

require_once('config/sample_config.php');

$request = array(
    'name' => "newMerchant",
    'legalCompanyTitle' => "legalCompanyTitle",
    'email' => "new_merchant@merchant.com",
    'website' => "www.merchant.com",
    'contactName' => "newName",
    'contactSurname' => "newSurname",
    'contactPhoneNumber' => "905555555566"
);

$response = SampleConfig::craftgate()->onboarding()->createMerchant($request);

print_r($response);
