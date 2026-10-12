<?php

use Craftgate\Model\PosStatus;

require_once('config/sample_config.php');


$response = SampleConfig::craftgate()->merchant()->updateMerchantPosStatus(array(
    'merchantPosId' => 1,
    'posStatus' => PosStatus::PASSIVE
));

print_r($response);
