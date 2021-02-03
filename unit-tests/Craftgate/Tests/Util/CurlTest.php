<?php

namespace Craftgate\Tests\HttpClient;

use Craftgate\Util\Curl;

class CurlTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_exec_curl()
    {
        $response = Curl::request('url', array(
            CURLOPT_CUSTOMREQUEST  => 'GET',
            CURLOPT_RETURNTRANSFER => true,
        ));

        $this->assertNotNull($response);
        $this->assertFalse($response);
    }
}
