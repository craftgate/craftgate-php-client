<?php

use Craftgate\Model\PosStatus;

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->merchant()->updateMerchantPosStatus(1, PosStatus::ACTIVE);

print_r($response);
