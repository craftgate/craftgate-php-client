<?php

require_once('config/sample_config.php');


$response = SampleConfig::craftgate()->payment()->approveBnplPayment(410502);

print_r($response);
