<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'gsmNumber' => "5333333333",
    'userId' => "user-id"
);

$response = SampleConfig::craftgate()->bkmExpress()->generateToken($request);

print_r($response);
