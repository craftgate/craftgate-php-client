<?php

require_once('config/sample_config.php');


$response = SampleConfig::craftgate()->merchant()->retrieveMerchantPos(1);

print_r($response);
