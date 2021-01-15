<?php

namespace Craftgate\Request\Common;

class RequestQueryParamsBuilder
{
    public static function buildQuery(array $request = null)
    {
        if ($request) {
            return "?" . str_replace('+', '%20', http_build_query($request));
        }
        return "";
    }
}
