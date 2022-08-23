<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->deleteValueList("ipList");

print_r($response);
