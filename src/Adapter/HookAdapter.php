<?php

namespace Craftgate\Adapter;

use Craftgate\Util\Signature;

class HookAdapter extends BaseAdapter
{

    public function isWebhookVerified($merchantHookKey, $incomingSignature, $webhookData)
    {
        $hashString = $webhookData["eventType"] . $webhookData["eventTimestamp"] . $webhookData["status"] . $webhookData["payloadId"];
        $signature = Signature::generateWebhookSignature($merchantHookKey, $hashString);

        return $incomingSignature == $signature;
    }
}
