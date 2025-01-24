<?php

require_once('config/sample_config.php');


$response = SampleConfig::craftgate()->merchant()->deleteMerchantPos(14);

print_r($response);
