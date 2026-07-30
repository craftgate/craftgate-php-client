<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->fraud()->removeValueFromValueList(array(
    'listName' => "ipList",
    'valueId' => "16d85c18-459d-4e44-820f-18ec7a4ed3a5"
));

print_r($response);
