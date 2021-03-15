<?php

namespace Craftgate\Model;

class PayoutStatus
{
    const CANCELLED = 'CANCELLED';
    const WAITING_FOR_PAYOUT = 'WAITING_FOR_PAYOUT';
    const PAYOUT_STARTED = 'PAYOUT_STARTED';
    const PAYOUT_COMPLETED = 'PAYOUT_COMPLETED';
}
