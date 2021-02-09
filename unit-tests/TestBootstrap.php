<?php

$loader = require dirname(__DIR__) . '/vendor/autoload.php';
$loader->addPsr4('Craftgate\\Tests\\', __DIR__ . '/');

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

/*
// Yields same results with the samples on docs: https://php.net/each
$foo = array("bob", "fred", "jussi", "jouni", "egon", "marliese");
print_r(each($foo));
$foo = array("Robert" => "Bob", "Seppo" => "Sepi");
print_r(each($foo));
print_r(each($foo));
print_r(each($foo)); // false
$fruit = array('a' => 'apple', 'b' => 'banana', 'c' => 'cranberry');
while (list($key, $val) = each($fruit)) {
    echo "$key => $val\n";
}
*/

date_default_timezone_set('UTC');
