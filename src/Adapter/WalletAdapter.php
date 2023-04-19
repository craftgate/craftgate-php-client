<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class WalletAdapter extends BaseAdapter
{

    public function createMemberWallet($memberId, array $request)
    {
        $path = "/wallet/v1/members/" . $memberId . "/wallets";
        return $this->httpPost($path, $request);
    }

    public function retrieveMemberWallet($memberId)
    {
        $path = "/wallet/v1/members/" . $memberId . "/wallet";
        return $this->httpGet($path);
    }

    public function searchWalletTransactions($walletId, array $request)
    {
        $path = "/wallet/v1/wallets/" . $walletId . "/wallet-transactions" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function updateMemberWallet($memberId, $walletId, array $request)
    {
        $path = "/wallet/v1/members/" . $memberId . "/wallets/". $walletId;
        return $this->httpPut($path, $request);
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

    public function retrieveRemittance($walletTransactionId)
    {
        $path = "/wallet/v1/remittances/" . $walletTransactionId;
        return $this->httpGet($path);
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

    public function refundWalletTransaction($walletTransactionId, array $request)
    {
        $path = "/payment/v1/wallet-transactions/" . $walletTransactionId . "/refunds";
        return $this->httpPost($path, $request);
    }

    public function retrieveRefundWalletTransactions($walletTransactionId)
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
