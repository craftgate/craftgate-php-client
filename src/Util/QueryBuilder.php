<?php

namespace Craftgate\Util;

use Craftgate\Request\HeaderOptions;

class QueryBuilder
{
    public static function build(array $params = null)
    {
        if ($params == null) {
            return '';
        }

        HeaderOptions::takeFrom($params);
        if (empty($params)) {
            return '';
        }

        return '?' . str_replace('+', '%20', http_build_query($params));
    }
}
