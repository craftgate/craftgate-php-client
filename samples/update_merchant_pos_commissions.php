<?php

use Craftgate\Model\CardBrand;
use Craftgate\Model\Status;

require_once('config/sample_config.php');

$request = array(
    'commissions' => array(
        array(
            'installment' => 1,
            'blockageDay' => 7,
            'status' => Status::ACTIVE,
            'cardBrandName' => CardBrand::AXESS,
            'installmentLabel' => "Single installment",
            'bankOnUsDebitCardCommissionRate' => 1.0,
            'bankOnUsCreditCardCommissionRate' => 1.1,
            'bankNotOnUsDebitCardCommissionRate' => 1.2,
            'bankNotOnUsCreditCardCommissionRate' => 1.3,
            'bankForeignCardCommissionRate' => 1.5
        ),
        array(
            'installment' => 2,
            'blockageDay' => 7,
            'status' => Status::ACTIVE,
            'cardBrandName' => CardBrand::AXESS,
            'installmentLabel' => "installment 2",
            'bankOnUsCreditCardCommissionRate' => 2.1,
            'merchantCommissionRate' => 2.3
        )
    )
);

$response = SampleConfig::craftgate()->merchant()->updateMerchantPosCommissions(1, $request);

print_r($response);
