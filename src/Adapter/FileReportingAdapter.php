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

    public function retrieveDailyPaymentReport(array $request)
    {
        $path = "/file-reporting/v1/payment-reports/" . QueryBuilder::build($request);
        return $this->httpGet($path, array('content-type: application/octet-stream'));
    }

    public function retrieveReport(array $request, $reportId)
    {
        $path = "/file-reporting/v1/reports/" . $reportId . QueryBuilder::build($request);
        return $this->httpGet($path, array('content-type: application/octet-stream'));
    }

    public function createReport(array $request)
    {
        $path = "/file-reporting/v1/report-demands";
        return $this->httpPost($path, $request);
    }
}
