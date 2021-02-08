<?php

namespace Craftgate\Util;

class QueryBuilder
{
    public static function build(array $params = null)
    {
        if ($params == null) {
            return '';
        }

        return '?' . str_replace('+', '%20', http_build_query($params));
    }
}
