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
}
