<?php

namespace Craftgate\Adapter;

use Craftgate\Options;
use Craftgate\Util\Util;

class WalletAdapter extends BaseAdapter
{
    public function __construct(Options $options)
    {
        parent::__construct($options);
    }

    public function searchWallets(array $request)
    {
        $path = "/wallet/v1/wallets" . Util::buildQuery($request);
        return parent::httpGet($path);
    }

    public function searchWalletTransactions($walletId, array $request)
    {
        $path = "/wallet/v1/wallets/" . $walletId . "/wallet-transactions" . Util::buildQuery($request);
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
