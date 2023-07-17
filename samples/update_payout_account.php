<?php

require_once('config/sample_config.php');

use Craftgate\Model\AccountOwner;
use Craftgate\Model\Currency;
use Craftgate\Model\PayoutAccountType;

$request = array(
    'type' => PayoutAccountType::WISE,
    'externalAccountId' => "wiseRecipientId2"
);

SampleConfig::craftgate()->settlement()->updatePayoutAccount(22, $request);
