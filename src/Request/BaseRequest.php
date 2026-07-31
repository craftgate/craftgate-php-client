<?php

namespace Craftgate\Request;

class BaseRequest
{
    const IDEMPOTENCY_KEY = 'idempotencyKey';

    private static function reservedKeys()
    {
        return array(
            self::IDEMPOTENCY_KEY => 'x-idempotency-key',
        );
    }

    public static function optionsOf($request)
    {
        $options = array();
        if (!is_array($request)) {
            return $options;
        }
        foreach (self::reservedKeys() as $key => $header) {
            if (isset($request[$key])) {
                $options[$key] = $request[$key];
            }
        }
        return $options;
    }

    public static function takeOptions(&$request)
    {
        $options = self::optionsOf($request);
        if (is_array($request)) {
            foreach (array_keys($options) as $key) {
                unset($request[$key]);
            }
        }
        return $options;
    }

    public static function toHeaders(array $options)
    {
        $headers = array();
        foreach (self::reservedKeys() as $key => $header) {
            if (isset($options[$key])) {
                $headers[] = $header . ': ' . $options[$key];
            }
        }
        return $headers;
    }
}
