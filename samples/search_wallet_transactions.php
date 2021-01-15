<?php

require_once('config/sample_config.php');

use Craftgate\Model\WalletTransactionType;

$request = array(
    'walletTransactionType' => WalletTransactionType::DEPOSIT_FROM_CARD
);

$response = FunctionalTestConfig::craftgate()->wallet()->searchWalletTransactions(1, $request);

print_r($response);
