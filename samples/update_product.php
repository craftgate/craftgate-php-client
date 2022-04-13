<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Model\Status;
use Craftgate\Util\Guid;

$request = array(
    'status' => Status::PASSIVE,
    'name' => "A new Product - version 2",
    'channel' => "API",
    'price' => 10,
    'currency' => Currency::TL,
    'enabledInstallments' => "1,2,3,6"
);

$response = SampleConfig::craftgate()->payByLink()->updateProduct(1, $request);

print_r($response);
