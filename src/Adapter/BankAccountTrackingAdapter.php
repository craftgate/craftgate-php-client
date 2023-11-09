<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class BankAccountTrackingAdapter extends BaseAdapter
{
    public function searchRecords(array $request)
    {
        $path = "/bank-account-tracking/v1/merchant-bank-account-trackings/records" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function retrieveRecord($id)
    {
        $path = "/bank-account-tracking/v1/merchant-bank-account-trackings/records/" . $id;
        return $this->httpGet($path);
    }
}
