<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->createValueList("ipList");

print_r($response);
