<?php

namespace Craftgate;

spl_autoload_register(function ($name) {
    if (strpos($name, __namespace__) === 0) {
        $name = substr($name, strlen(__namespace__) + 1);
        $name = strtr($name, '\\', DIRECTORY_SEPARATOR);
        ($file = realpath(
            __DIR__ . DIRECTORY_SEPARATOR
            . 'src' . DIRECTORY_SEPARATOR
            . $name . '.php'
        )) && require $file;
    }
});
