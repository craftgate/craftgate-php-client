<?php

namespace Craftgate\Util;

class AuthSignatureGenerator
{
    public static function generateSignature($requestOptions, $path, $randomString, $request = null)
    {
        $requestString = "";
        if ($request) {
            $requestString = json_encode($request);
        }

        $hashStr = $requestOptions->getBaseUrl() . urldecode($path) . $requestOptions->getApiKey() . $requestOptions->getSecretKey() . $randomString . $requestString;
        return base64_encode(hash("sha256", $hashStr, true));
    }
}
