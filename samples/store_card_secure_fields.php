<?php

require_once('config/sample_config.php');

$request = array(
    'secureFieldsToken' => 'tok-a158e3d1-179d-4ab4-a60f-032c760f31c7',
);

$response = SampleConfig::craftgate()->payment()->storeCard($request);

print_r($response);
