<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->payment()->retrieveActiveBanks();

print_r($response);
