<?php

require_once('config/sample_config.php');

$request = array(
    'providerCardToken' => '45f12c74-3000-465c-96dc-876850e7dd7a',
    'externalId' => 1001,
    'providerCardUserId' => '0309ac2d-c5a5-4b4f-a91f-5c444ba07b24',
);

$response = SampleConfig::craftgate()->payment()->retrieveProviderCard($request);

print_r($response);
