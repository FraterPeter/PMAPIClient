<?php
/*
	class Response: represents an API call response

	Part of the Sign-Up.to Permission Marketing API v0.1 Redistributable


	Copyright (c) 2013 Sign-Up Technologies Ltd.
	All rights reserved.

	Redistribution and use in source and binary forms, with or without
	modification, are permitted provided that the following conditions are met:

	1. Redistributions of source code must retain the above copyright notice, this
	   list of conditions and the following disclaimer.
	2. Redistributions in binary form must reproduce the above copyright notice,
	   this list of conditions and the following disclaimer in the documentation
	   and/or other materials provided with the distribution.

	THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
	ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
	WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
	DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
	ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
	(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
	LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
	ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
	(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
	SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

namespace SuT\PMAPI\Client\Core;

class Response
{
    protected $count = null; // number of results returned
    protected $error = null; // error message
    protected $headers = ''; // raw header data - currently unused
    protected $isError = null; // bool indicating error state
    protected $next = null; // key of the first item in the next page of results
    protected $rawResponse = ''; // raw data returned from peer
    protected $response = null; // interpreted JSON data (nested arrays)
    protected $status = null; // status code
    protected $verb = null; // request verb (get, head, put, ...)


    const UNKNOWN_ERROR_MSG = '(unknown error)';


    public function __construct($verb)
    {
        $this->verb = $verb;
    }


    public function __get($what)
    {
        switch ($what)
        {
            case 'count':
            case 'error':
            case 'isError':
            case 'next':
            case 'response':
            case 'status':
            case 'verb':
                return $this->$what;

            case 'data':
                return $this->isError ? null : $this->response['response']['data'];

            default:
                throw new NoSuchFieldException("No such field '$what'");
        }
    }


    // finalise(): set status code; parse and validate server response.
    //
    public function finalise($status)
    {
        $this->status = $status;

        if (($this->verb == 'head') && !strlen($this->response))
        {
            return;
        } // No response text expected for HEAD requests

        if (!($this->response = json_decode($this->rawResponse, true)))
        {
            throw new InvalidResponseException('empty response');
        }

        $this->rawResponse = null;

        // Validate response
        foreach (array('status', 'response') as $required)
            if (!isset($this->response[$required]))
            {
                throw new InvalidResponseException("missing field [$required]");
            }

        if (!is_array($this->response['response']))
        {
            throw new InvalidResponseException("[response] is not an array");
        }

        $resp =& $this->response['response'];
        switch ($this->response['status'])
        {
            case 'ok':
                foreach (array('count', 'data') as $required)
                    if (!isset($resp[$required]))
                    {
                        throw new InvalidResponseException("missing field [response][$required]");
                    }

                if ($this->verb == 'get')
                {
                    if (!array_key_exists('next', $resp)) // resp[next] can be null
                    {
                        throw new InvalidResponseException("missing field [response][next]");
                    }
                }

                if (!is_array($resp['data']))
                {
                    throw new InvalidResponseException("[response][data] is not an array");
                }

                $this->count   = (int) $resp['count'];
                $this->next    = $resp['next'];
                $this->isError = false;
                break;

            case 'error':
                $this->isError = true;
                $this->error   = isset($resp['message']) ? $resp['message'] : self::UNKNOWN_ERROR_MSG;
                break;

            default:
                throw new InvalidResponseException("unknown status '{$this->response['status']}'");
        }
    }


    // Return the MIME type of data required by this class.
    //
    public function getResponseFormat()
    {
        return 'application/json';
    }


    public function responseCallback()
    {
        return array($this, 'receiveResponse');
    }


    // cURL callback: receives raw response text from peer server.
    //
    public function receiveResponse($curl, $data)
    {
        $this->rawResponse .= $data;
        return strlen($data);
    }


    public function headerCallback()
    {
        return array($this, 'receiveHeaders');
    }


    // cURL callback: receives header data from peer server.
    //
    public function receiveHeaders($curl, $data)
    {
        $this->headers .= $data;
        return strlen($data);
    }
}

