<?php

namespace Craftgate\Util;

class Signature
{
    public static function generate($requestOptions, $path, $randomString, $request = null)
    {
        $hash = $requestOptions->getBaseUrl() . urldecode($path)
              . $requestOptions->getApiKey()  . $requestOptions->getSecretKey()
              . $randomString                 . ($request ? json_encode($request) : '');

        return base64_encode(hash('sha256', $hash, true));
    }
}
