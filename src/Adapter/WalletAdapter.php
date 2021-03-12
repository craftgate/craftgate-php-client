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

    public function retrieveMerchantMemberWallet()
    {
        $path = "/wallet/v1/merchants/me/wallet";
        return $this->httpGet($path);
    }

    public function resetMerchantMemberWalletBalance(array $request)
    {
        $path = "/wallet/v1/merchants/me/wallet/reset-balance";
        return $this->httpPost($path, $request);
    }

    public function retrieveRefundableAmountOfWalletTransaction($walletTransactionId)
    {
        $path = "/payment/v1/wallet-transactions/" . $walletTransactionId . "/refundable-amount";
        return $this->httpGet($path);
    }

    public function refundWalletTransactionToCard($walletTransactionId, array $request)
    {
        $path = "/payment/v1/wallet-transactions/" . $walletTransactionId . "/refunds";
        return $this->httpPost($path, $request);
    }

    public function retrieveRefundWalletTransactionsToCard($walletTransactionId)
    {
        $path = "/payment/v1/wallet-transactions/" . $walletTransactionId . "/refunds";
        return $this->httpGet($path);
    }

    public function createWithdraw(array $request)
    {
        $path = "/wallet/v1/withdraws";
        return $this->httpPost($path, $request);
    }

    public function cancelWithdraw($withdrawId)
    {
        $path = "/wallet/v1/withdraws/" . $withdrawId . "/cancel";
        return $this->httpPost($path);
    }

    public function retrieveWithdraw($withdrawId)
    {
        $path = "/wallet/v1/withdraws/" . $withdrawId;
        return $this->httpGet($path);
    }

    public function searchWithdraws(array $request)
    {
        $path = "/wallet/v1/withdraws" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }
}
