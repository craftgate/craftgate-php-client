<?php

namespace Craftgate\Request;

/**
 * Reserved request keys sent as headers rather than in the body. Requests here are plain arrays,
 * so this holds the key names and the helpers that lift them out before signing.
 *
 * New request-scoped options are added to the map below and nowhere else.
 */
class BaseRequest
{
    /** Sent as the x-idempotency-key header so a mutating call can be safely retried. */
    const IDEMPOTENCY_KEY = 'idempotencyKey';

    /**
     * Reserved request key => the header it is sent as.
     *
     * @return array
     */
    private static function reservedKeys()
    {
        return array(
            self::IDEMPOTENCY_KEY => 'x-idempotency-key',
        );
    }

    /**
     * Returns the reserved options carried by $request, leaving $request untouched.
     *
     * @param mixed $request request array
     * @return array
     */
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

    /**
     * Removes the reserved options from $request and returns them.
     *
     * Copy-on-write leaves the caller's own array intact, so it can be passed again to retry.
     *
     * @param mixed $request request array, modified in place
     * @return array
     */
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

    /**
     * Renders reserved options as header lines.
     *
     * @param array $options
     * @return array
     */
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
