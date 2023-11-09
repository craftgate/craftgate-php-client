<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->bankAccountTracking()->retrieveRecord(1);

print_r($response);
