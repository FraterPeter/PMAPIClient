<?php

use SuT\PMAPI\Client\Core;
use SuT\PMAPI\Client\Helpers;

class AuthHashTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->validHash = str_repeat('a', SuT\PMAPI\Client\Core\AuthHash::SUT_API_HASH_LEN);
        $this->authHash  = new SuT\PMAPI\Client\Core\AuthHash(1, 2, $this->validHash);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFail_UID()
    {
        new SuT\PMAPI\Client\Core\AuthHash("a", 2, $this->validHash);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFail_CID()
    {
        new SuT\PMAPI\Client\Core\AuthHash(1, "a", $this->validHash);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFail_Hash()
    {
        new SuT\PMAPI\Client\Core\AuthHash(1, 2, 1);
    }


    public function testCheckHeaders()
    {
        $headers = $this->authHash->getHeaders("GET", "1", "account");

        $this->assertArrayHasKey("Authorization", $headers);
        $this->assertArrayHasKey("Date", $headers);
        $this->assertArrayHasKey("X-SuT-Nonce", $headers);
        $this->assertEquals(strlen($headers["X-SuT-Nonce"]), 40);
        $this->assertArrayHasKey("X-SuT-CID", $headers);
        $this->assertArrayHasKey("X-SuT-UID", $headers);
    }
}