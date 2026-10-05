<?php

require_once('config/sample_config.php');

$request = array(
    'cardUserKey' => '45f12c74-3000-465c-96dc-876850e7dd7a',
    'callToken' => '0309ac2d-c5a5-4b4f-a91f-5c444ba07b24',
);

$response = SampleConfig::craftgate()->payment()->retrieveCardFromIvr($request);

print_r($response);
