<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class PaymentReportingAdapter extends BaseAdapter
{
    public function searchPayments($request)
    {
        $path = "/payment-reporting/v1/payments" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }
}
