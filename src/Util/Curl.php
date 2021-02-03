<?php

namespace Craftgate\Util;

class Curl
{
    public static function get($url, array $headers)
    {
        return self::request($url, array(
            CURLOPT_CUSTOMREQUEST  => 'GET',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => $headers,
        ));
    }

    public static function post($url, array $headers, $content)
    {
        return self::request($url, array(
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_POSTFIELDS     => json_encode($content),
        ));
    }

    public static function put($url, array $headers, $content)
    {
        return self::request($url, array(
            CURLOPT_CUSTOMREQUEST  => 'PUT',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_POSTFIELDS     => json_encode($content),
        ));
    }

    public static function delete($url, array $headers)
    {
        return self::request($url, array(
            CURLOPT_CUSTOMREQUEST  => 'DELETE',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => $headers,
        ));
    }

    private static function request($url, $options)
    {
        $request = curl_init($url);
        curl_setopt_array($request, $options);

        $response = curl_exec($request);

        if ($response === false) {
            throw new \Exception(curl_error($request), curl_errno($request));
        }

        curl_close($request);
        unset($request); // PHP 8.0

        return $response;
    }
}
