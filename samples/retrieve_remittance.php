<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->wallet()->retrieveRemittance(1);

print_r($response);
