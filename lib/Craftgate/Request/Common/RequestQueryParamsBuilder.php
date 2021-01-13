<?php

namespace Craftgate\Request\Common;

class RequestQueryParamsBuilder
{
    public static function buildQuery(array $request = null)
    {
        if ($request) {
            return "?" . http_build_query($request);
        }
        return "";
    }
}
