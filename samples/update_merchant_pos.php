<?php

use Craftgate\Model\CardAssociation;
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
    'hostname' => "https://www.sanalakpos.com",
    'threedsPath' => "https://www.sanalakpos.com/fim/est3dgate",
    'mode' => "P",
    'port' => 443,
    'status' => PosStatus::AUTOPILOT,
    'currency' => Currency::TL,
    'orderNumber' => 1,
    'enableInstallment' => true,
    'enableForeignCard' => true,
    'enablePaymentWithoutCvc' => true,
    'posIntegrator' => PosIntegrator::AKBANK,
    'supportedCardAssociations' => array(CardAssociation::VISA, CardAssociation::MASTER_CARD),
    'enabledPaymentAuthenticationTypes' => array(PaymentAuthenticationType::THREE_DS, PaymentAuthenticationType::NON_THREE_DS),
    'merchantPosUsers' => array(
        array(
            'id' => 14,
            'posOperationType' => PosOperationType::STANDARD,
            'posUserType' => PosUserType::API,
            'posUsername' => "username",
            'posPassword' => "password"
        )
    )
);

$response = SampleConfig::craftgate()->merchant()->updateMerchantPos(14, $request);

print_r($response);
