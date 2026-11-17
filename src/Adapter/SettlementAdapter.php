<?php

namespace Craftgate\Adapter;

class SettlementAdapter extends BaseAdapter
{
    public function createInstantWalletSettlement(array $request)
    {
        $path = "/settlement/v1/instant-wallet-settlements";
        return $this->httpPost($path, $request);
    }

    public function approvePaymentTransactions(array $request)
    {
        $path = "/settlement/v1/payment-transactions/approve";
        return $this->httpPost($path, $request);
    }

    public function disapprovePaymentTransactions(array $request)
    {
        $path = "/settlement/v1/payment-transactions/disapprove";
        return $this->httpPost($path, $request);
    }

    public function updatePaymentTransaction($paymentTransactionId, array $request)
    {
        $path = "/settlement/v1/payment-transactions/" . $paymentTransactionId;
        return $this->httpPut($path, $request);
    }
}
