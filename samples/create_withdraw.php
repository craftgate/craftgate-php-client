<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;

$request = array(
    'memberId' => 1,
    'price' => 100,
    'description' => 'Hakediş Çekme Talebi',
    'currency' => Currency::TL
);

$response = SampleConfig::craftgate()->wallet()->createWithdraw($request);

print_r($response);
