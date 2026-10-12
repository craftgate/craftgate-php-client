<?php

require_once('config/sample_config.php');

$request = array(
    'secureFieldsToken' => 'xxXXxx',
    'clientIp' => '127.0.0.1',
    'clientPort' => 51520,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5'
);

$response = SampleConfig::craftgate()->payment()->retrieveLoyalties($request);

print_r($response);
