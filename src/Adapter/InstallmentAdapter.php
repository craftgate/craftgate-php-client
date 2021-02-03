<?php

namespace Craftgate\Adapter;

use Craftgate\Util\Util;

class InstallmentAdapter extends AbstractAdapter
{
    public function searchInstallments(array $request)
    {
        $path = "/installment/v1/installments" . Util::buildrequest($request);
        return parent::httpGet($path);
    }

    public function retrieveBinNumber($binNumber)
    {
        $path = "/installment/v1/bins/" . $binNumber;
        return parent::httpGet($path);
    }
}
