<?php

use SuT\PMAPI\Client\Core;
use SuT\PMAPI\Client\Helpers;

class AuthTokenTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $token           = str_repeat("a", 96);
        $this->authToken = new SuT\PMAPI\Client\Core\AuthToken($token);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFail()
    {
        // Token should be 96 chars [a-z0-9/+]
        $token = 'abcde!' . str_repeat("!", 90);
        new SuT\PMAPI\Client\Core\AuthToken($token);
    }


    public function testConstructorSuccess()
    {
        $token = str_repeat("a", 96);
        new SuT\PMAPI\Client\Core\AuthToken($token);
    }


    public function testCheckHeaders()
    {
        $headers = $this->authToken->getHeaders("GET", "1", "account");

        $this->assertArrayHasKey("Authorization", $headers);
        $this->assertArrayHasKey("Date", $headers);
        $this->assertArrayHasKey("X-SuT-Nonce", $headers);
        $this->assertEquals(strlen($headers["X-SuT-Nonce"]), 40);
    }
}