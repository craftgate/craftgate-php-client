<?php

require_once('config/sample_config.php');

$request = array(
        'sourceCardUserKey' => 'fac377f2-ab15-4696-88d2-5e71b27ec378',
        'sourceCardToken' => '11a078c4-3c32-4796-90b1-51ee5517a212',
        'targetMerchantId' => 1,
);

$response = SampleConfig::craftgate()->payment()->cloneCard($request);

print_r($response);
