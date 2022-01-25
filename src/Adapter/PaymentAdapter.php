<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class PaymentAdapter extends BaseAdapter
{
    public function createPayment(array $request)
    {
        $path = "/payment/v1/card-payments";
        return $this->httpPost($path, $request);
    }

    public function retrievePayment($paymentId)
    {
        $path = "/payment/v1/card-payments/" . $paymentId;
        return $this->httpGet($path);
    }

    public function postAuthPayment($paymentId, array $request)
    {
        $path = "/payment/v1/card-payments/" . $paymentId . "/post-auth";
        return $this->httpPost($path, $request);
    }

    public function init3DSPayment(array $request)
    {
        $path = "/payment/v1/card-payments/3ds-init";
        return $this->httpPost($path, $request);
    }

    public function complete3DSPayment(array $request)
    {
        $path = "/payment/v1/card-payments/3ds-complete";
        return $this->httpPost($path, $request);
    }

    public function initCheckoutPayment(array $request)
    {
        $path = "/payment/v1/checkout-payments/init";
        return $this->httpPost($path, $request);
    }

    public function retrieveCheckoutPayment($token)
    {
        $path = "/payment/v1/checkout-payments/" . $token;
        return $this->httpGet($path);
    }

    public function createDepositPayment(array $request)
    {
        $path = "/payment/v1/deposits";
        return $this->httpPost($path, $request);
    }

    public function init3DSDepositPayment(array $request)
    {
        $path = "/payment/v1/deposits/3ds-init";
        return $this->httpPost($path, $request);
    }

    public function complete3DSDepositPayment(array $request)
    {
        $path = "/payment/v1/deposits/3ds-complete";
        return $this->httpPost($path, $request);
    }

    public function retrieveLoyalties(array $request)
    {
        $path = "/payment/v1/card-loyalties/retrieve";
        return $this->httpPost($path, $request);
    }

    public function refundPaymentTransaction(array $request)
    {
        $path = "/payment/v1/refund-transactions";
        return $this->httpPost($path, $request);
    }

    public function retrievePaymentTransactionRefund($refundTransactionId)
    {
        $path = "/payment/v1/refund-transactions/" . $refundTransactionId;
        return $this->httpGet($path);
    }

    public function refundPayment(array $request)
    {
        $path = "/payment/v1/refunds";
        return $this->httpPost($path, $request);
    }

    public function retrievePaymentRefund($refundId)
    {
        $path = "/payment/v1/refunds/" . $refundId;
        return $this->httpGet($path);
    }

    public function storeCard(array $request)
    {
        $path = "/payment/v1/cards";
        return $this->httpPost($path, $request);
    }

    public function updateCard(array $request)
    {
        $path = "/payment/v1/cards/update";
        return $this->httpPost($path, $request);
    }

    public function searchStoredCards(array $request)
    {
        $path = "/payment/v1/cards" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function deleteStoredCard(array $request)
    {
        $path = "/payment/v1/cards" . QueryBuilder::build($request);
        return $this->httpDelete($path);
    }

    public function approvePaymentTransactions(array $request)
    {
        $path = "/payment/v1/payment-transactions/approve";
        return $this->httpPost($path, $request);
    }

    public function disapprovePaymentTransactions(array $request)
    {
        $path = "/payment/v1/payment-transactions/disapprove";
        return $this->httpPost($path, $request);
    }

    public function checkMasterpassUser(array $request)
    {
        $path = "/payment/v1/masterpass-payments/check-user";
        return $this->httpPost($path, $request);
    }
}
