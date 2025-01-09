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

    public function deletePayoutAccount($id)
    {
        $path = "/settlement/v1/payout-accounts/" . $id;
        return $this->httpDelete($path);
    }

    public function searchPayoutAccount(array $request)
    {
        $path = "/settlement/v1/payout-accounts" . QueryBuilder::build($request);
        return $this->httpGet($path, $request);
    }
}
