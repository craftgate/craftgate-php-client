<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;
use Craftgate\Model\Currency;
use Craftgate\Model\PaymentGroup;
use Craftgate\Util\Guid;

$request = array(
    'apmType' => ApmType::PAPARA,
    'price' => 1,
    'currency' => Currency::TL,
    'buyerMemberId' => 1,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'externalId' => 'optional-externalId',
    'callbackUrl' => 'https://www.your-website.com/craftgate-apm-callback',
    'clientIp' => '127.0.0.1'
);

$response = SampleConfig::craftgate()->payment()->initApmDepositPayment($request);

print_r($response);
