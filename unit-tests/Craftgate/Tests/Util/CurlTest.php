<?php

namespace Craftgate\Tests\Util;

use Craftgate\Util\Curl;

class CurlTest extends \PHPUnit_Framework_TestCase
{
    public function test_response_should_be_null_and_cause_exception()
    {
        $response = Curl::get('foo', array());

        $this->assertNull($response);
    }

    public function test_response_should_not_be_null_and_cause_exception()
    {
        $response = Curl::get('https://httpbin.org/', array());

        $this->assertNotNull($response);
    }
}
