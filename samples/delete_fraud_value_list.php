<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->deleteValueList(array(
    'listName' => "ipList"
));

print_r($response);
