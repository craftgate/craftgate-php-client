<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->payment()->retrieveMultiPayment("6d7e66b5-9b1c-4c1d-879a-2557b651096e");

print_r($response);
