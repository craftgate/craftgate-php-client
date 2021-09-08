<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class PaymentReportingAdapter extends BaseAdapter
{
    public function searchPayments(array $request)
    {
        $path = "/payment-reporting/v1/payments" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function retrievePayment($paymentId)
    {
        $path = "/payment-reporting/v1/payments/" . $paymentId;
        return $this->httpGet($path);
    }

    public function retrievePaymentTransactions($paymentId)
    {
        $path = "/payment-reporting/v1/payments/" . $paymentId . "/transactions";
        return $this->httpGet($path);
    }

    public function retrievePaymentRefunds($paymentId)
    {
        $path = "/payment-reporting/v1/payments/" . $paymentId . "/refunds";
        return $this->httpGet($path);
    }

    public function retrievePaymentTransactionRefunds($paymentId, $paymentTransactionId)
    {
        $path = "/payment-reporting/v1/payments/" . $paymentId . "/transactions/" . $paymentTransactionId . "/refunds";
        return $this->httpGet($path);
    }

    public function searchPaymentRefunds(array $request)
    {
        $path = "/payment-reporting/v1/refunds" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function searchPaymentTransactionRefunds(array $request)
    {
        $path = "/payment-reporting/v1/refund-transactions" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }
}
