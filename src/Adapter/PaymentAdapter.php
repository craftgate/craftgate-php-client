<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;
use Craftgate\Util\Signature;

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

    public function expireCheckoutPayment($token)
    {
        $path = "/payment/v1/checkout-payments/" . $token;
        return $this->httpDelete($path);
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

    public function createFundTransferDepositPayment(array $request)
    {
        $path = "/payment/v1/deposits/fund-transfer";
        return $this->httpPost($path, $request);
    }

    public function initApmDepositPayment(array $request)
    {
        $path = "/payment/v1/deposits/apm-init";
        return $this->httpPost($path, $request);
    }

    public function initGarantiPayPayment(array $request)
    {
        $path = "/payment/v1/garanti-pay-payments";
        return $this->httpPost($path, $request);
    }

    public function initApmPayment(array $request)
    {
        $path = "/payment/v1/apm-payments/init";
        return $this->httpPost($path, $request);
    }

    public function completeApmPayment(array $request)
    {
        $path = "/payment/v1/apm-payments/complete";
        return $this->httpPost($path, $request);
    }

    public function createApmPayment(array $request)
    {
        $path = "/payment/v1/apm-payments";
        return $this->httpPost($path, $request);
    }

    public function initPosApmPayment(array $request)
    {
        $path = "/payment/v1/pos-apm-payments/init";
        return $this->httpPost($path, $request);
    }

    public function completePosApmPayment(array $request)
    {
        $path = "/payment/v1/pos-apm-payments/complete";
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

    public function cloneCard(array $request)
    {
        $path = "/payment/v1/cards/clone";
        return $this->httpPost($path, $request);
    }

    public function searchStoredCards(array $request)
    {
        $path = "/payment/v1/cards" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function deleteStoredCard(array $request)
    {
        $path = "/payment/v1/cards/delete";
        return $this->httpPost($path, $request);
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

    public function updatePaymentTransaction($paymentTransactionId, array $request)
    {
        $path = "/payment/v1/payment-transactions/" . $paymentTransactionId;
        return $this->httpPut($path, $request);
    }

    public function createApplePayMerchantSession(array $request)
    {
        $path = "/payment/v1/apple-pay/merchant-sessions";
        return $this->httpPost($path, $request);
    }

    public function retrieveBnplOffers(array $request)
    {
        $path = "/payment/v1/bnpl-payments/offers";
        return $this->httpPost($path, $request);
    }

    public function initBnplPayment(array $request)
    {
        $path = "/payment/v1/bnpl-payments/init";
        return $this->httpPost($path, $request);
    }

    public function approveBnplPayment($paymentId)
    {
        $path =  "/payment/v1/bnpl-payments/" . $paymentId . "/approve";
        return $this->httpPost($path);
    }

    public function verifyBnplPayment(array $request)
    {
        $path =  "/payment/v1/bnpl-payments/verify";
        return $this->httpPost($path, $request);
    }

    public function retrieveActiveBanks()
    {
        $path = "/payment/v1/instant-transfer-banks";
        return $this->httpGet($path);
    }

    public function retrieveMultiPayment($token)
    {
        $path = "/payment/v1/multi-payments/" . $token;
        return $this->httpGet($path);
    }

    public function retrieveProviderCard(array $request)
    {
        $path = "/payment/v1/cards/provider-card-mappings" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function is3DSecureCallbackVerified($threeDSecureCallbackKey, $params)
    {
        $hash = $params["hash"];
        $hashString = $threeDSecureCallbackKey .
            "###" . $this->extractParam('status', $params) .
            "###" . $this->extractParam('completeStatus', $params) .
            "###" . $this->extractParam('paymentId', $params) .
            "###" . $this->extractParam('conversationData', $params) .
            "###" . $this->extractParam('conversationId', $params) .
            "###" . $this->extractParam('callbackStatus', $params);

        $hashed = Signature::generateHash($hashString);
        return $hash == $hashed;
    }

    private function extractParam($key, $params)
    {
        return isset($params[$key]) ? $params[$key] : '';
    }
}
