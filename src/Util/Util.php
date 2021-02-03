<?php

namespace Craftgate\Util;

class Util
{
    public static function buildQuery(array $params = null)
    {
        if ($params == null) {
            return '';
        }

        return '?' . str_replace('+', '%20', http_build_query($params));
    }
}
