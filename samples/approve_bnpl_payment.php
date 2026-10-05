<?php

require_once('config/sample_config.php');


$response = SampleConfig::craftgate()->payment()->approveBnplPayment(array(
    'paymentId' => 1
));

print_r($response);
