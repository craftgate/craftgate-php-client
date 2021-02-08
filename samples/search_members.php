<?php

require_once('config/sample_config.php');

use Craftgate\Model\MemberType;

$request = array(
    'name' => 'Zeytinyağı Üretim',
    'page' => 0,
    'size' => 25,
    'memberIds' => array(1, 2),
    'memberType' => MemberType::LIMITED_OR_JOINT_STOCK_COMPANY
);

$response = SampleConfig::craftgate()->onboarding()->searchMembers($request);

print_r($response);
