<?php

require_once('config/sample_config.php');

use Craftgate\Model\MemberType;

$request = array(
    'isBuyer' => true,
    'isSubMerchant' => false,
    'name' => 'Haluk Demir',
    'email' => 'haluk.demir@example.com',
    'identityNumber' => '11111111110',
    'phoneNumber' => '905551111111',
    'memberType' => MemberType::PERSONAL,
    'contactName' => 'Haluk',
    'contactSurname' => 'Demir',
    'address' => 'Suadiye Mah. Örnek Cd. No:23, 34740 Kadıköy/İstanbul'
);

$response = SampleConfig::craftgate()->onboarding()->updateMember(1, $request);

print_r($response);
