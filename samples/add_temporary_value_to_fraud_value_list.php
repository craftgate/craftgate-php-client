<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->addValueToValueList("ipList", "127.0.0.2", 60);

print_r($response);
