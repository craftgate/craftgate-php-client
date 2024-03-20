<?php

require_once('config/sample_config.php');

use Craftgate\Model\ApmType;
use Craftgate\Model\BnplCartItemType;
use Craftgate\Model\Currency;

$request = array(
    'apmType' => ApmType::MASLAK,
    'price' => 10000,
    'currency' => Currency::TL,
    'items' => array(
        array(
            'id' => '200',
            'name' => 'Test Elektronik 2',
            'brandName' => 'iphone',
            'type' => BnplCartItemType::OTHER,
            'unitPrice' => 3000,
            'quantity' => 2,
        ),
        array(
            'id' => '100',
            'name' => 'Test Elektronik 1',
            'brandName' => 'Samsung',
            'type' => BnplCartItemType::MOBILE_PHONE_PRICE_ABOVE_REGULATION_LIMIT,
            'unitPrice' => 4000,
            'quantity' => 1,
        )
    )
);

$response = SampleConfig::craftgate()->payment()->retrieveBnplOffers($request);

print_r($response);