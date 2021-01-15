<?php

namespace Craftgate\Tests\Util;

use Craftgate\Request\Common\RequestQueryParamsBuilder;
use Craftgate\Util\AuthSignatureGenerator;

class RequestQueryParamsBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_build_query()
    {
        $input = array("foo" => "bar");
        $expected = "?foo=bar";
        $actual = RequestQueryParamsBuilder::buildQuery($input);
        $this->assertEquals($expected, $actual);
    }

    public function test_should_build_empty_string_when_request_is_null()
    {
        $input = null;
        $expected = "";
        $actual = RequestQueryParamsBuilder::buildQuery($input);
        $this->assertEquals($expected, $actual);
    }

    public function test_should_escape_whitespaces_and_unicode_characters_correctly()
    {
        $input = array("foo" => "Zeytinyağı Üretim");
        $expected = "?foo=Zeytinya%C4%9F%C4%B1%20%C3%9Cretim";
        $actual = RequestQueryParamsBuilder::buildQuery($input);
        $this->assertEquals($expected, $actual);
    }
}
