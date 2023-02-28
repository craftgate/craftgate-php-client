<?php

require_once('config/sample_config.php');

use Craftgate\Model\Currency;
use Craftgate\Model\PosIntegrator;
use Craftgate\Model\PosOperationType;
use Craftgate\Model\PosStatus;
use Craftgate\Model\PosUserType;

$request = array(
    'name' => 'my new test pos',
    'hostname' => 'https://www.sanalakpos.com',
    'clientId' => 'client id',
    'mode' => 'P',
    'path' => '/fim/api',
    'port' => 443,
    'threedsKey' => '3d secure key',
    'threedsPath' => 'https://www.sanalakpos.com/fim/est3dgate',
    'forceThreeDs' => false,
    'enableForeignCard' => true,
    'enableInstallment' => true,
    'enablePaymentWithoutCvc' => true,
    'newIntegration' => false,
    'orderNumber' => 1,
    'merchantPosUsers' => array(
        array(
            'id' => 10,
            'posUsername' => 'username',
            'posPassword' => 'password',
            'posUserType' => PosUserType::API,
            'posOperationType' => PosOperationType::STANDARD
        )
    ),
    'supportedCardAssociations' => array('MASTER_CARD', 'VISA')
);

$response = SampleConfig::craftgate()->merchant()->updateMerchantPos(1, $request);

print_r($response);
