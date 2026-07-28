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

    public function retrieveBinNumber($binNumber, $includeGlobalBins = false)
    {
        $path = "/installment/v1/bins/" . $binNumber . ($includeGlobalBins ? "?includeGlobalBins=true" : "");
        return $this->httpGet($path);
    }
}
