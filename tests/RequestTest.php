<?php

use SuT\PMAPI\Client\Core;
use SuT\PMAPI\Client\Helpers;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->validHash    = str_repeat('a', SuT\PMAPI\Client\Core\AuthHash::SUT_API_HASH_LEN);
        $this->authHash     = new SuT\PMAPI\Client\Core\AuthHash(1, 2, $this->validHash);
        $this->server       = "api.sign-up.to";
        $this->version      = 1;
        $this->endpointName = "account";
        $this->request      = new SuT\PMAPI\Client\Core\Request($this->authHash, $this->server, $this->version, $this->endpointName);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFailServer()
    {
        $x = new SuT\PMAPI\Client\Core\Request($this->authHash, null, $this->version, $this->endpointName);
        $x->{$this->endpointName};
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFailVersion()
    {
        $x = new SuT\PMAPI\Client\Core\Request($this->authHash, $this->server, null, $this->endpointName);
        $x->{$this->endpointName};
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorFailEndpoint()
    {
        $x = new SuT\PMAPI\Client\Core\Request($this->authHash, $this->server, $this->version, null);
        $x->{$this->endpointName};
    }
}