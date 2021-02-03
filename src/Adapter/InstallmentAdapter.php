<?php

namespace Craftgate\Adapter;

use Craftgate\Options;
use Craftgate\Util\Util;

class InstallmentAdapter extends BaseAdapter
{
    public function __construct(Options $options)
    {
        parent::__construct($options);
    }

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
