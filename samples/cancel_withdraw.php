<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->wallet()->cancelWithdraw(array(
    'withdrawId' => 1
));

print_r($response);
