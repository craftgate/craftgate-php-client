<?php

require_once('config/sample_config.php');

use Craftgate\Model\MemberType;
use Craftgate\Model\SettlementEarningsDestination;

$request = array(
    'isBuyer' => false,
    'isSubMerchant' => true,
    'name' => 'Dem Zeytinyağı Üretim Ltd. Şti.',
    'address' => 'Suadiye Mah. Örnek Cd. No:23, 34740 Kadıköy/İstanbul',
    'email' => 'haluk.demir@example.com',
    'iban' => 'TR930006701000000001111111',
    'phoneNumber' => '905551111111',
    'contactName' => 'Haluk',
    'contactSurname' => 'Demir',
    'identityNumber' => '11111111110',
    'legalCompanyTitle' => 'Dem Zeytinyağı Üretim Ltd. Şti.',
    'taxNumber' => '1111111114',
    'taxOffice' => 'Erenköy',
    'memberType' => MemberType::LIMITED_OR_JOINT_STOCK_COMPANY,
    'settlementEarningsDestination' => SettlementEarningsDestination::IBAN
);

$response = FunctionalTestConfig::craftgate()->onboarding()->updateMember(1, $request);

print_r($response);
