<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->payByLink()->retrieveProduct(1);

print_r($response);
