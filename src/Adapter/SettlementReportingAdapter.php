<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class SettlementReportingAdapter extends BaseAdapter
{
    public function searchPayoutCompletedItems(array $request)
    {
        $path = "/settlement-reporting/v1/settlement-file/payout-completed-items" . QueryBuilder::build($request);
        return $this->httpGet($path, null, $request);
    }

    public function searchBouncedPayoutTransactions(array $request)
    {
        $path = "/settlement-reporting/v1/settlement-file/bounced-sub-merchant-rows" . QueryBuilder::build($request);
        return $this->httpGet($path, null, $request);
    }

    public function retrieveSettlementRow($settlementRowId)
    {
        $path = "/settlement-reporting/v1/settlement-file/rows/" . $settlementRowId;
        return $this->httpGet($path);
    }

    public function searchPayoutRows(array $request)
    {
        $path = "/settlement-reporting/v1/settlement-file-rows" . QueryBuilder::build($request);
        return $this->httpGet($path, null, $request);
    }

    public function retrievePaymentTransactionPayout($paymentTransactionId)
    {
        $path = "/settlement-reporting/v1/payment-transactions/" . $paymentTransactionId . "/payout";
        return $this->httpGet($path);
    }

    public function searchPaymentTransactionPayouts(array $request)
    {
        $path = "/settlement-reporting/v1/payment-transactions/payouts" . QueryBuilder::build($request);
        return $this->httpGet($path, null, $request);
    }
}
