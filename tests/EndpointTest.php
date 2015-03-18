<?php

use SuT\PMAPI\Client\Core;
use SuT\PMAPI\Client\Helpers;

class EndpointTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->validHash    = str_repeat('a', SuT\PMAPI\Client\Core\AuthHash::SUT_API_HASH_LEN);
        $this->authHash     = new SuT\PMAPI\Client\Core\AuthHash(1, 2, $this->validHash);
        $this->server       = "api.sign-up.to";
        $this->version      = 1;
        $this->endpointName = "account";
        $this->endpoint     = new SuT\PMAPI\Client\Core\Endpoint($this->authHash, $this->server, $this->version, $this->endpointName);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFailServer()
    {
        new SuT\PMAPI\Client\Core\Endpoint($this->authHash, null, $this->version, $this->endpointName);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFailVersion()
    {
        new SuT\PMAPI\Client\Core\Endpoint($this->authHash, $this->server, null, $this->endpointName);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFailEndpoint()
    {
        new SuT\PMAPI\Client\Core\Endpoint($this->authHash, $this->server, $this->version, null);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\UnsupportedMethodException
     */
    public function testCallFail()
    {
        $this->endpoint->fail();
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidArgumentException
     */
    public function testCallGetWithBadParams()
    {
        $this->endpoint->get(array('' => 'Bad'));
    }
}