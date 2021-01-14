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

        $hashStr = $requestOptions->getBaseUrl() . $path . $requestOptions->getApiKey() . $requestOptions->getSecretKey() . $randomString . $requestString;
        return strtoupper(base64_encode(hash("sha256", $hashStr, true)));
    }
}
