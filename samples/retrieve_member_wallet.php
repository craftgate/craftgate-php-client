<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->wallet()->retrieveMemberWallet(1);

print_r($response);
