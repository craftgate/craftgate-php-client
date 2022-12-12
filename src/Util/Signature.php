<?php

namespace Craftgate\Util;

use Craftgate\CraftgateOptions;

class Signature
{
    public static function generate(CraftgateOptions $options, $path, $randomString, $request)
    {
        $hash = $options->getBaseUrl() . urldecode($path)
            . $options->getApiKey() . $options->getSecretKey()
            . $randomString . ($request ? json_encode($request) : '');

        return base64_encode(hash('sha256', $hash, true));
    }

    public static function generateHash($hashString)
    {
        return hash('sha256', $hashString, false);
    }

    public static function generateWebhookSignature($merchantHookKey, $hashString)
    {
        return base64_encode(hash_hmac('sha256', $hashString, $merchantHookKey,true));
    }
}
