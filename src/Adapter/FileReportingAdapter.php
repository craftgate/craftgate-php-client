<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class FileReportingAdapter extends BaseAdapter
{
    public function retrieveDailyTransactionReport(array $request)
    {
        $path = "/file-reporting/v1/transaction-reports/" . QueryBuilder::build($request);
        return $this->httpGet($path, array('content-type: application/octet-stream'));
    }
}
