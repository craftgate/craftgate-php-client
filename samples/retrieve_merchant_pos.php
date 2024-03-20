<?php

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentAuthenticationType;
use Craftgate\Model\PosIntegrator;
use Craftgate\Model\PosOperationType;
use Craftgate\Model\PosStatus;
use Craftgate\Model\PosUserType;

require_once('config/sample_config.php');


$response = SampleConfig::craftgate()->merchant()->retrieveMerchantPos(1);

print_r($response);
