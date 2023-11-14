<?php

require_once('config/sample_config.php');


$response = SampleConfig::craftgate()->payment()->approveBnplPayment(1);

print_r($response);
