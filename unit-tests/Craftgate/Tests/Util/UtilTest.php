<?php

namespace Craftgate\Tests\Util;

use Craftgate\Util\Util;

class UtilTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_build_query()
    {
        $params = array("foo" => "bar");
        $expected = "?foo=bar";
        $actual = Util::buildQuery($params);
        $this->assertEquals($expected, $actual);
    }

    public function test_should_build_empty_string_when_params_is_null()
    {
        $params = null;
        $expected = "";
        $actual = Util::buildQuery($params);
        $this->assertEquals($expected, $actual);
    }

    public function test_should_escape_whitespaces_and_unicode_characters_correctly()
    {
        $params = array("foo" => "Zeytinyağı Üretim");
        $expected = "?foo=Zeytinya%C4%9F%C4%B1%20%C3%9Cretim";
        $actual = Util::buildQuery($params);
        $this->assertEquals($expected, $actual);
    }
}
