<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->retrieveAllValueLists();

print_r($response);
