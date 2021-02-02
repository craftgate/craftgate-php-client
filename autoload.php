<?php

spl_autoload_register(function ($name) {
    if (strpos($name, 'Craftgate') === 0) {
        ($file = realpath(
            __DIR__ . DIRECTORY_SEPARATOR
            . 'lib' . DIRECTORY_SEPARATOR
            . strtr($name, '\\', DIRECTORY_SEPARATOR)
            . '.php'
        )) && require $file;
    }
});
