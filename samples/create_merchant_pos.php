<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PosIntegrator;
use Craftgate\Model\PosOperationType;
use Craftgate\Model\PosStatus;
use Craftgate\Model\PosUserType;

$request = array(
    'name' => "my test pos",
    'clientId' => "client id",
    'terminalId' => "terminal id",
    'threedsKey' => "3d secure key",
    'status' => PosStatus::AUTOPILOT,
    'currency' => Currency::TL,
    'orderNumber' => 1,
    'forceThreeDs' => false,
    'enableInstallment' => true,
    'enableForeignCard' => true,
    'enablePaymentWithoutCvc' => true,
    'posIntegrator' => PosIntegrator::AKBANK,
    'merchantPosUsers' => array(
        array(
            'posUsername' => "username",
            'posPassword' => "password",
            'posOperationType' => PosOperationType::STANDARD,
            'posUserType' => PosUserType::API
        ),
    ),
);

$response = SampleConfig::craftgate()->merchant()->createMerchantPos($request);

print_r($response);
