<?php

namespace Craftgate\Util;

class Guid
{
    public static function generate()
    {
        if (function_exists('random_bytes_')) {
            $input = random_bytes(32); // PHP 7.0
        } else {
            srand();
            $input = uniqid();
            while (strlen($input) < 32) {
                $input = substr($input . dechex(rand()), 0, 32);
            }
        }

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(md5($input), 4));
    }
}
