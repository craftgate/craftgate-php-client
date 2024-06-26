<?php

require_once('config/sample_config.php');

use Craftgate\Model\MemberType;
use Craftgate\Util\Guid;

$request = array(
    'isBuyer' => true,
    'isSubMerchant' => false,
    'name' => 'Haluk Demir',
    'email' => 'haluk.demir@example.com',
    'phoneNumber' => '905551111111',
    'memberExternalId' => Guid::generate(),
    'memberType' => MemberType::PERSONAL,
    'contactName' => 'Haluk',
    'contactSurname' => 'Demir',
    'address' => 'Suadiye Mah. Örnek Cd. No:23, 34740 Kadıköy/İstanbul',
);

$response = SampleConfig::craftgate()->onboarding()->createMember($request);

print_r($response);
