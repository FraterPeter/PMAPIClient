<?php

use SuT\PMAPI\Client\Core;
use SuT\PMAPI\Client\Helpers;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    private $supportedVerbs = array(
        'count',
        'error',
        'isError',
        'next',
        'response',
        'status',
        'verb',
        'data',
    );


    public function setUp()
    {
        $this->verb     = "GET";
        $this->response = new SuT\PMAPI\Client\Core\Response($this->verb);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\InvalidValueException
     */
    public function testConstructorInvalidVerb()
    {
        new SuT\PMAPI\Client\Core\Response(null);
    }


    /**
     * @expectedException   SuT\PMAPI\Client\Core\NoSuchFieldException
     */
    public function testGetInvalidVerb()
    {
        $this->response->bad;
    }


    public function testGetVerbs()
    {
        foreach ($this->supportedVerbs as $verb)
        {
            $this->response->$verb;
        }
    }


    public function testResponseFormat()
    {
        $this->assertEquals('application/json', $this->response->getResponseFormat());
    }


    public function testResponseCallback()
    {
        list($item1, $item2) = $this->response->responseCallback();

        $this->assertEquals(get_class($item1), 'SuT\PMAPI\Client\Core\Response');
        $this->assertEquals($item2, 'receiveResponse');
    }


    public function testResponseHeaders()
    {
        list($item1, $item2) = $this->response->headerCallback();

        $this->assertEquals(get_class($item1), 'SuT\PMAPI\Client\Core\Response');
        $this->assertEquals($item2, 'receiveHeaders');
    }
}