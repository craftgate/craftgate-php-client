<?php

$loader = require dirname(__DIR__) . '/vendor/autoload.php';
$loader->addPsr4('Craftgate\\Tests\\', __DIR__ . '/');

date_default_timezone_set('UTC');

if (!function_exists('each')) {
    function each(array &$array)
    {
        $value = current($array);
        $key = key($array);

        if (is_null($key)) {
            return false;
        }

        // Move pointer.
        next($array);

        return array(1 => $value, 'value' => $value, 0 => $key, 'key' => $key);
    }
}
