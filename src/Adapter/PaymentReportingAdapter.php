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

    public function retrievePayment($paymentId)
    {
        $path = "/payment-reporting/v1/payments/" . $paymentId;
        return $this->httpGet($path);
    }

    public function listPaymentTransactions($paymentId)
    {
        $path = "/payment-reporting/v1/payments/" . $paymentId . "/transactions";
        return $this->httpGet($path);
    }

    public function listPaymentRefunds($paymentId)
    {
        $path = "/payment-reporting/v1/payments/" . $paymentId . "/refunds";
        return $this->httpGet($path);
    }

    public function listPaymentTransactionRefunds($paymentId, $paymentTransactionId)
    {
        $path = "/payment-reporting/v1/payments/" . $paymentId . "/transactions/" . $paymentTransactionId . "/refunds";
        return $this->httpGet($path);
    }

    public function searchRefunds($request)
    {
        $path = "/payment-reporting/v1/refunds" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function searchPaymentTransactionRefunds($request)
    {
        $path = "/payment-reporting/v1/refund-transactions" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }
}
