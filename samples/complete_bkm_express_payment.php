<?php

require_once('config/sample_config.php');

$request = array(
    'status' => true,
    'message' => 'İşlem Başarılı',
    'ticketId' => 'dcfdc163-0545-46d7-8f86-5a11718e56ec'
);

$response = SampleConfig::craftgate()->bkmExpress()->complete($request);

print_r($response);
