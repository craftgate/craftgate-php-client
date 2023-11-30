<?php

use Craftgate\Model\Currency;
use Craftgate\Model\PaymentAuthenticationType;
use Craftgate\Model\PosIntegrator;
use Craftgate\Model\PosOperationType;
use Craftgate\Model\PosStatus;
use Craftgate\Model\PosUserType;

require_once('config/sample_config.php');

$request = array(
    'name' => "my test pos",
    'clientId' => "client id",
    'terminalId' => "terminal id",
    'threedsKey' => "3d secure key",
    'status' => PosStatus::AUTOPILOT,
    'currency' => Currency::TL,
    'orderNumber' => 1,
    'enableInstallment' => true,
    'enableForeignCard' => true,
    'enablePaymentWithoutCvc' => true,
    'posIntegrator' => PosIntegrator::AKBANK,
    'enabledPaymentAuthenticationTypes' => array(PaymentAuthenticationType::THREE_DS, PaymentAuthenticationType::NON_THREE_DS),
    'merchantPosUsers' => array(
        array(
            'posOperationType' => PosOperationType::STANDARD,
            'posUserType' => PosUserType::API,
            'posUsername' => "username",
            'posPassword' => "password"
        )
    )
);

$response = SampleConfig::craftgate()->merchant()->createMerchantPos($request);

print_r($response);
