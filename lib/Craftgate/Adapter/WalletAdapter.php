<?php

namespace Craftgate\Adapter;

use Craftgate\Request\Common\RequestQueryParamsBuilder;

class WalletAdapter extends BaseAdapter
{
    public function __construct($requestOptions)
    {
        parent::__construct($requestOptions);
    }

    public function searchWallets(array $request)
    {
        $path = "/wallet/v1/wallets" . RequestQueryParamsBuilder::buildQuery($request);
        return parent::httpGet($path);
    }

    public function searchWalletTransactions($walletId, array $request)
    {
        $path = "/wallet/v1/wallets/" . $walletId . "/wallet-transactions" . RequestQueryParamsBuilder::buildQuery($request);
        return parent::httpGet($path);
    }

    public function sendRemittance(array $request)
    {
        $path = "/wallet/v1/remittances/send";
        return parent::httpPost($path, $request);
    }

    public function receiveRemittance(array $request)
    {
        $path = "/wallet/v1/remittances/receive";
        return parent::httpPost($path, $request);
    }
}
