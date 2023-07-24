<?php

require_once('config/sample_config.php');

use Craftgate\Model\CardAssociation;
use Craftgate\Model\CardType;

$request = array(
    'cardAlias' => 'My YKB Card',
    'cardBankName' => 'YAPI VE KREDİ BANKASI A.Ş.',
    'cardBrand' => 'World',
    'cardAssociation' => CardAssociation::MASTER_CARD,
    'cardToken' => 'd9b19d1a-243c-43dc-a498-add08162df72',
    'cardUserKey' => 'c115ecdf-0afc-4d83-8a1b-719c2af19cbd',
    'cardType' => CardType::CREDIT_CARD
);

$response = SampleConfig::craftgate()->payment()->searchStoredCards($request);

print_r($response);
