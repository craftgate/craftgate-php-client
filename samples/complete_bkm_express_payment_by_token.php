<?php

require_once('config/sample_config.php');

$request = array(
    'status' => true,
    'message' => 'İşlem Başarılı',
    'ticketId' => '7c0f7c89-e954-46d5-ad37-2a5c0b5f0356',
    'bkmExpressPaymentToken' => '23f4e147-2c4e-4a2c-8a67-9c783d813b79'
);

$response = SampleConfig::craftgate()->bkmExpress()->complete($request);

print_r($response);
