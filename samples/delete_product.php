<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->payByLink()->deleteProduct(1);

print_r($response);
