<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->payByLink()->deleteProduct(array(
    'id' => 1
));

print_r($response);
