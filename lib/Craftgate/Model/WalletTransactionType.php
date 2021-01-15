<?php

namespace Craftgate\Model;

class WalletTransactionType
{
    const PAYMENT_REDEEM = "PAYMENT_REDEEM";
    const REFUND_DEPOSIT = "REFUND_DEPOSIT";
    const REFUND_TX_DEPOSIT = "REFUND_TX_DEPOSIT";
    const CANCEL_REFUND_TO_WALLET = "CANCEL_REFUND_TO_WALLET";
    const REFUND_TX_TO_WALLET = "REFUND_TX_TO_WALLET";
    const MANUAL_REFUND_TX_TO_WALLET = "MANUAL_REFUND_TX_TO_WALLET";
    const DEPOSIT_FROM_CARD = "DEPOSIT_FROM_CARD";
    const REMITTANCE = "REMITTANCE";
    const LOYALTY = "LOYALTY";
}
