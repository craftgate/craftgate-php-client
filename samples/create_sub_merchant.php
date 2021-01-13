<?php

require_once('config/sample_config.php');

use Craftgate\Model\SubMerchantType;

$request = array(
    'name' => 'Dem Zeytinyağı Üretim Ltd. Şti.',
    'address' => 'Suadiye Mah. Örnek Cd. No:23, 34740 Kadıköy/İstanbul',
    'email' => 'haluk.demir@example.com',
    'iban' => 'TR930006701000000001111111',
    'gsmNumber' => '905551111111',
    'contactName' => 'Haluk',
    'contactSurname' => 'Demir',
    'identityNumber' => '11111111110',
    'subMerchantType' => SubMerchantType::LIMITED_OR_JOINT_STOCK_COMPANY,
    'subMerchantExternalId' => uniqid(),
    'legalCompanyTitle' => 'Dem Zeytinyağı Üretim Ltd. Şti.',
    'taxNumber' => '1111111114',
    'taxOffice' => 'Erenköy'
);

$response = FunctionalTestConfig::craftgate()->onboarding()->createSubMerchant($request);

print_r($response);
