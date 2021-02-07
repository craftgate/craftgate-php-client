<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class WalletAdapter extends BaseAdapter
{
    public function searchWallets(array $request)
    {
        $path = "/wallet/v1/wallets" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function searchWalletTransactions($walletId, array $request)
    {
        $path = "/wallet/v1/wallets/" . $walletId . "/wallet-transactions" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function sendRemittance(array $request)
    {
        $path = "/wallet/v1/remittances/send";
        return $this->httpPost($path, $request);
    }

    public function receiveRemittance(array $request)
    {
        $path = "/wallet/v1/remittances/receive";
        return $this->httpPost($path, $request);
    }
}
