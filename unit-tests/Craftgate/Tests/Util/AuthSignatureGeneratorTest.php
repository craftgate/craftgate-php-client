<?php

namespace Craftgate\Tests\Util;

use Craftgate\Request\Common\RequestOptions;
use Craftgate\Util\AuthSignatureGenerator;

class AuthSignatureGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_generate_signature()
    {
        $options = new RequestOptions();
        $options->setApiKey('api-key');
        $options->setSecretKey('secret-key');
        $options->setBaseUrl('http://localhost:8000');

        $this->assertEquals("UK7LKWOEZVH+PX/YOIMUSXVPKHLR4KOA7PUYKXCYOVQ=", AuthSignatureGenerator::generateSignature($options, "/installment/v1/installments", "1234", null));
    }

    public function test_should_generate_signature_with_body()
    {
        $options = new RequestOptions();
        $options->setApiKey('api-key');
        $options->setSecretKey('secret-key');
        $options->setBaseUrl('http://localhost:8000');

        $request = array(
            'cardUserKey' => 'de050909-39a9-473c-a81a-f186dd55cfef'
        );

        $this->assertEquals("KQM62AFJXCW6RS6QBCLXTA9TV1GQD/SXSALYP+CEHG8=", AuthSignatureGenerator::generateSignature($options, "/payment/v1/cards", "1234", $request));
    }

    public function test_should_generate_signature_with_encoded_query_string()
    {
        $options = new RequestOptions();
        $options->setApiKey('api-key');
        $options->setSecretKey('secret-key');
        $options->setBaseUrl('http://localhost:8000');

        $this->assertEquals("VXYA+5LH3F4M8THQA2LPVBWZVGCQGRHUE4XAGCVJJYQ=", AuthSignatureGenerator::generateSignature($options, "/onboarding/v1/members?name=Zeytinya%C4%9F%C4%B1%20%C3%9Cretim", "1234", null));
    }
}
