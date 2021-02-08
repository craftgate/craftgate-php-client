<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class InstallmentAdapter extends BaseAdapter
{
    public function searchInstallments(array $request)
    {
        $path = "/installment/v1/installments" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function retrieveBinNumber($binNumber)
    {
        $path = "/installment/v1/bins/" . $binNumber;
        return $this->httpGet($path);
    }
}
