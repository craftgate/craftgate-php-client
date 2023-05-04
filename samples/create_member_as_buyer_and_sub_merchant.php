<?php

require_once('config/sample_config.php');

use Craftgate\Model\MemberType;
use Craftgate\Model\SettlementEarningsDestination;
use Craftgate\Util\Guid;

$request = array(
    'isBuyer' => true,
    'isSubMerchant' => true,
    'name' => 'Dem Zeytinyağı Üretim Ltd. Şti.',
    'address' => 'Suadiye Mah. Örnek Cd. No:23, 34740 Kadıköy/İstanbul',
    'email' => 'haluk.demir@example.com',
    'iban' => 'TR930006701000000001111111',
    'phoneNumber' => '905551111111',
    'contactName' => 'Haluk',
    'contactSurname' => 'Demir',
    'identityNumber' => '11111111110',
    'memberType' => MemberType::LIMITED_OR_JOINT_STOCK_COMPANY,
    'memberExternalId' => Guid::generate(),
    'legalCompanyTitle' => 'Dem Zeytinyağı Üretim Ltd. Şti.',
    'taxNumber' => '1111111114',
    'taxOffice' => 'Erenköy'
);

$response = SampleConfig::craftgate()->onboarding()->createMember($request);

print_r($response);
