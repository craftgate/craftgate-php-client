<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->merchantApm()->retrieveApms();

print_r($response);
