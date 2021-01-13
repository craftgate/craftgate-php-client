<?php

namespace Craftgate\Adapter;

use Craftgate\Request\Common\RequestQueryParamsBuilder;

class PaymentAdapter extends BaseAdapter
{
    public function __construct($requestOptions)
    {
        parent::__construct($requestOptions);
    }

    public function createPayment(array $request)
    {
        $path = "/payment/v1/card-payments";
        return parent::httpPost($path, $request);
    }

    public function init3DSPayment(array $request)
    {
        $path = "/payment/v1/card-payments/3ds-init";
        return parent::httpPost($path, $request);
    }

    public function complete3DSPayment(array $request)
    {
        $path = "/payment/v1/card-payments/3ds-complete";
        return parent::httpPost($path, $request);
    }

    public function initCheckoutPayment(array $request)
    {
        $path = "/payment/v1/checkout-payment/init";
        return parent::httpPost($path, $request);
    }

    public function retrieveCheckoutPayment($token)
    {
        $path = "/payment/v1/checkout-payment?token=" . $token;
        return parent::httpGet($path);
    }

    public function approvePaymentTransactions(array $request)
    {
        $path = "/payment/v1/payment-transactions/approve";
        return parent::httpPost($path, $request);
    }

    public function disapprovePaymentTransactions(array $request)
    {
        $path = "/payment/v1/payment-transactions/disapprove";
        return parent::httpPost($path, $request);
    }

    public function refundPayment(array $request)
    {
        $path = "/payment/v1/refunds";
        return parent::httpPost($path, $request);
    }

    public function retrievePaymentRefund($refundId)
    {
        $path = "/payment/v1/refunds/" . $refundId;
        return parent::httpGet($path);
    }

    public function refundPaymentTransaction(array $request)
    {
        $path = "/payment/v1/refund-transactions";
        return parent::httpPost($path, $request);
    }

    public function retrievePaymentTransactionRefund($refundTransactionId)
    {
        $path = "/payment/v1/refund-transactions/" . $refundTransactionId;
        return parent::httpGet($path);
    }

    public function searchPaymentTransactionRefunds(array $request)
    {
        $path = "/payment/v1/refund-transactions" . RequestQueryParamsBuilder::buildQuery($request);
        return parent::httpGet($path);
    }

    public function retrievePayment($paymentId)
    {
        $path = "/payment/v1/card-payments/" . $paymentId;
        return parent::httpGet($path);
    }

    public function searchPayments(array $request)
    {
        $path = "/payment/v1/card-payments" . RequestQueryParamsBuilder::buildQuery($request);
        return parent::httpGet($path);
    }

    public function deleteStoredCard(array $request)
    {
        $path = "/payment/v1/cards" . RequestQueryParamsBuilder::buildQuery($request);
        return parent::httpDelete($path);
    }

    public function searchStoredCards(array $request)
    {
        $path = "/payment/v1/cards" . RequestQueryParamsBuilder::buildQuery($request);
        return parent::httpGet($path);
    }
}
