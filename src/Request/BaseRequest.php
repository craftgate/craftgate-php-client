<?php

namespace Craftgate\Request;

/**
 * Reserved request keys sent as headers rather than in the body. Requests here are plain arrays,
 * so this holds the key names and the helper that lifts them out before signing.
 */
class BaseRequest
{
    /** Sent as the x-idempotency-key header so a mutating call can be safely retried. */
    const IDEMPOTENCY_KEY = 'idempotencyKey';

    /**
     * Removes the reserved idempotency key from $request and returns it, or null when absent.
     *
     * Copy-on-write leaves the caller's own array intact, so it can be passed again to retry.
     *
     * @param mixed $request request array, modified in place
     * @return string|null
     */
    public static function takeIdempotencyKey(&$request)
    {
        if (!is_array($request) || !isset($request[self::IDEMPOTENCY_KEY])) {
            return null;
        }

        $idempotencyKey = $request[self::IDEMPOTENCY_KEY];
        unset($request[self::IDEMPOTENCY_KEY]);

        return $idempotencyKey;
    }
}
