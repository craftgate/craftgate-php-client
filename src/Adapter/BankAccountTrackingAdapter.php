<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;
use Craftgate\Util\Signature;

class BankAccountTrackingAdapter extends BaseAdapter
{
    public function searchRecords(array $request)
    {
        $path = "/bank-account-tracking/v1/merchant-bank-account-trackings/records" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }
}
