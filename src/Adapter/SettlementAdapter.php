<?php

namespace Craftgate\Adapter;

class SettlementAdapter extends BaseAdapter
{
    public function createInstantWalletSettlement(array $request)
    {
        $path = "/settlement/v1/instant-wallet-settlements";
        return $this->httpPost($path, $request);
    }
}
