<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->retrieveValueList("ipList");

print_r($response);
