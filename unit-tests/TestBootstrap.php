<?php

$loader = require dirname(__DIR__) . '/vendor/autoload.php';
$loader->addPsr4('Craftgate\\Tests\\', __DIR__ . '/');

date_default_timezone_set('UTC');

if (class_exists('PHPUnit_Framework_TestCase')) {
    class TestCase extends \PHPUnit_Framework_TestCase {}
} else {
    class TestCase extends \PHPUnit\Framework\TestCase {}
}
