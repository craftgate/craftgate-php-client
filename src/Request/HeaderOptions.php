<?php

namespace Craftgate\Request;

class HeaderOptions
{
    const REQUEST_KEY = 'headerOptions';
    const IDEMPOTENCY_KEY = 'idempotencyKey';
    const IDEMPOTENCY_KEY_HEADER_NAME = 'x-idempotency-key';

    public static function of($request)
    {
        $options = array();
        if (!is_array($request) || !isset($request[self::REQUEST_KEY]) || !is_array($request[self::REQUEST_KEY])) {
            return $options;
        }
        $headerOptions = $request[self::REQUEST_KEY];
        if (isset($headerOptions[self::IDEMPOTENCY_KEY]) && $headerOptions[self::IDEMPOTENCY_KEY] !== '') {
            $options[self::IDEMPOTENCY_KEY] = $headerOptions[self::IDEMPOTENCY_KEY];
        }
        return $options;
    }

    public static function takeFrom(&$request)
    {
        $options = self::of($request);
        if (is_array($request)) {
            unset($request[self::REQUEST_KEY]);
        }
        return $options;
    }

    public static function toHeaders(array $options)
    {
        $headers = array();
        if (isset($options[self::IDEMPOTENCY_KEY])) {
            $headers[] = self::IDEMPOTENCY_KEY_HEADER_NAME . ': ' . $options[self::IDEMPOTENCY_KEY];
        }
        return $headers;
    }
}
