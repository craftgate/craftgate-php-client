<?php

namespace Craftgate\Adapter;

use Craftgate\Util\Util;

class PaymentAdapter extends AbstractAdapter
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
        $path = "/payment/v1/checkout-payment/init";
        return $this->httpPost($path, $request);
    }

    public function retrieveCheckoutPayment($token)
        {
            $path = "/payment/v1/checkout-payment?token=" . $token;
            return $this->httpGet($path);
        }

    public function createDepositPayment(array $request)
    {
        $path = "/payment/v1/deposits";
        return $this->httpPost($path, $request);
    }

    public function refundDepositPayment($paymentId, array $request)
    {
        $path = "/payment/v1/deposits/" . $paymentId . "/refunds";
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

    public function searchPaymentTransactionRefunds(array $request)
    {
        $path = "/payment/v1/refund-transactions" . Util::buildQuery($request);
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

    public function searchStoredCards(array $request)
    {
        $path = "/payment/v1/cards" . Util::buildQuery($request);
        return $this->httpGet($path);
    }

    public function deleteStoredCard(array $request)
    {
        $path = "/payment/v1/cards" . Util::buildQuery($request);
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
}
