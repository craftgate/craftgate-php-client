<?php

namespace Craftgate\Util;

use Craftgate\ClientOptions;

class Signature
{
    public static function generate(ClientOptions $options, $path, $randomString, $request = null)
    {
        $hash = $options->getBaseUrl() . urldecode($path)
              . $options->getApiKey()  . $options->getSecretKey()
              . $randomString          . ($request ? json_encode($request) : '');

        return base64_encode(hash('sha256', $hash, true));
    }
}
