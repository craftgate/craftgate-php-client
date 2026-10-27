<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class SettlementAdapter extends BaseAdapter
{
    public function createInstantWalletSettlement(array $request)
    {
        $path = "/settlement/v1/instant-wallet-settlements";
        return $this->httpPost($path, $request);
    }

    public function createPayoutAccount(array $request)
    {
        $path = "/settlement/v1/payout-accounts";
        return $this->httpPost($path, $request);
    }

    public function updatePayoutAccount($id, array $request)
    {
        $path = "/settlement/v1/payout-accounts/" . $id;
        return $this->httpPut($path, $request);
    }

    public function deletePayoutAccount(array $request)
    {
        $path = "/settlement/v1/payout-accounts/" . $request['id'];
        return $this->httpDelete($path, null, $request);
    }

    public function searchPayoutAccount(array $request)
    {
        $path = "/settlement/v1/payout-accounts" . QueryBuilder::build($request);
        return $this->httpGet($path, $request, $request);
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
