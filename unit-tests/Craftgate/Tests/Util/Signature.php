<?php

namespace Craftgate\Tests\Util;

use Craftgate\Request\Common\RequestOptions;
use Craftgate\Util\Signature;

class SignatureTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_generate_signature()
    {
        $options = new RequestOptions(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'http://localhost:8000',
        ));

        $this->assertEquals("uK7LkWOEzVH+Px/YOiMuSXvPkHLR4KoA7PuykXcYovQ=",
            Signature::generate($options, "/installment/v1/installments", "1234", null));
    }

    public function test_should_generate_signature_with_body()
    {
        $options = new RequestOptions(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'http://localhost:8000',
        ));

        $request = array(
            'cardUserKey' => 'de050909-39a9-473c-a81a-f186dd55cfef'
        );

        $this->assertEquals("kQm62AfjXCw6rS6QBCLXta9tV1GqD/SXsAlYP+cEhG8=",
            Signature::generate($options, "/payment/v1/cards", "1234", $request));
    }

    public function test_should_generate_signature_with_encoded_query_string()
    {
        $options = new RequestOptions(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'http://localhost:8000',
        ));

        $this->assertEquals("vxYA+5LH3F4m8tHQA2LpVBwzVgCqGRHue4XAgcVjjYQ=",
            Signature::generate($options, "/onboarding/v1/members?name=Zeytinya%C4%9F%C4%B1%20%C3%9Cretim", "1234", null));
    }
}
