<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->onboarding()->retrieveMember(1);

print_r($response);
