<?php

require_once('config/sample_config.php');

$request = array(
    'secureFieldsToken' => 'xxXXxx',
);

$response = SampleConfig::craftgate()->payment()->storeCard($request);

print_r($response);
