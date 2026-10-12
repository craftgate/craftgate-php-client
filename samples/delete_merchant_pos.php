<?php

require_once('config/sample_config.php');


$response = SampleConfig::craftgate()->merchant()->deleteMerchantPos(array(
    'merchantPosId' => 14
));

print_r($response);
