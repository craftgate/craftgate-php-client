<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;

$request = array(
    'binNumber' => '525864',
    'price' => 100,
    'currency' => Currency::TRY
);

$response = FunctionalTestConfig::craftgate()->installment()->searchInstallments($request);

print_r($response);
