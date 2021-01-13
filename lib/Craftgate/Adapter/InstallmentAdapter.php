<?php

namespace Craftgate\Adapter;

use Craftgate\Request\Common\RequestQueryParamsBuilder;

class InstallmentAdapter extends BaseAdapter
{
    public function __construct($requestOptions)
    {
        parent::__construct($requestOptions);
    }

    public function searchInstallments(array $request)
    {
        $path = "/installment/v1/installments" . RequestQueryParamsBuilder::buildQuery($request);
        return parent::httpGet($path);
    }

    public function retrieveBinNumber($binNumber)
    {
        $path = "/installment/v1/bins/" . $binNumber;
        return parent::httpGet($path);
    }
}
