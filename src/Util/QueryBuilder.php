<?php

namespace Craftgate\Util;

use Craftgate\Request\BaseRequest;

class QueryBuilder
{
    public static function build(array $params = null)
    {
        if ($params == null) {
            return '';
        }

        // The signature covers the full URL, so a leak here would ship silently.
        BaseRequest::takeIdempotencyKey($params);
        if (empty($params)) {
            return '';
        }

        return '?' . str_replace('+', '%20', http_build_query($params));
    }
}
