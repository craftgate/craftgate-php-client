<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->merchant()->deleteMerchantPos(1);

print_r($response);
