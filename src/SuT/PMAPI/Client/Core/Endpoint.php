<?php
/*
	class Endpoint: represents a PMAPI endpoint.

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

class Endpoint
{
    const API_SCHEME = 'https';
    const USER_AGENT = ' client v0.1';

    protected $Auth;
    protected $version;
    protected $endpoint;
    protected $server;
    protected $debugMode;


    public function __construct(Auth $Auth, $server, $version, $endpoint, $debugMode = false)
    {
        if (!function_exists('curl_init'))
        {
            throw new RuntimeEnvironmentException('This class requires the cURL extension');
        }

        if (!preg_match('/^\d+$/', $version))
        {
            throw new InvalidValueException('version', $version);
        }

        if (!preg_match('/^[a-z_]+$/i', $endpoint))
        {
            throw new InvalidValueException('endpoint', $endpoint);
        }

        $this->Auth      = $Auth;
        $this->server    = rtrim($server, '/');
        $this->version   = (int) $version;
        $this->endpoint  = $endpoint;
        $this->debugMode = (bool) $debugMode;
    }


    public function __call($verb, $args)
    {
        if (in_array($verb, array('delete', 'get', 'head', 'post', 'put')))
        {
            return $this->doRequest($verb, count($args) ? $args[0] : null);
        }
        else
        {
            throw new UnsupportedMethodException($verb);
        }
    }


    protected function doRequest($verb, array $args = null)
    {
        if (is_array($args) && $args)
        {
            foreach ($args as $key => $val)
            {
                if (!strlen($key))
                {
                    throw new InvalidArgumentException($key, $val);
                }
            }
        }

        $Response = new Response($verb);

        $url = self::API_SCHEME . "://{$this->server}/v{$this->version}/{$this->endpoint}";

        $headers           = $this->Auth->getHeaders($verb, $this->version, $this->endpoint);
        $headers['Accept'] = $Response->getResponseFormat();

        $curl      = curl_init();
        $curl_opts = array();

        switch ($verb)
        {
            case 'post':
                $curl_opts[CURLOPT_POST] = true;
                if (!empty($args))
                {
                    $curl_opts[CURLOPT_POSTFIELDS] = json_encode($args);
                    $headers['Content-Type']       = 'application/json';
                }
                break;

            case 'put':
                $fp = fopen('php://temp', 'w');
                fwrite($fp, json_encode((array) $args));
                $len = ftell($fp);
                fseek($fp, 0);
                $curl_opts[CURLOPT_PUT]        = 1;
                $curl_opts[CURLOPT_INFILE]     = $fp;
                $curl_opts[CURLOPT_INFILESIZE] = $len;
                $headers['Content-Type']       = 'application/json';
                break;

            case 'delete':
            case 'head':
                $curl_opts[CURLOPT_CUSTOMREQUEST] = strtoupper($verb);
            case 'get':
                if (count($args))
                {
                    $url .= '?' . http_build_query((array) $args);
                }
                break;
        }

        $headers_ = array();
        foreach ($headers as $k => $v)
            $headers_[] = strtoupper(str_replace('X_SUT', 'HTTP_X_SUT', str_replace('_', '-', $k))) . ": $v";

        $curl_opts += array
        (
            CURLOPT_URL            => $url,
            CURLOPT_HTTPHEADER     => $headers_,
            CURLOPT_WRITEFUNCTION  => $Response->responseCallback(),
            CURLOPT_HEADERFUNCTION => $Response->headerCallback(),
        );

        if ($this->debugMode)
        {
            $curl_opts[CURLOPT_SSL_VERIFYPEER] = false;
        }

        curl_setopt_array($curl, $curl_opts);
        if (!curl_exec($curl))
        {
            throw new CURLException(curl_error($curl), curl_errno($curl));
        }

        $Response->finalise(curl_getinfo($curl, CURLINFO_HTTP_CODE));

        return $Response;
    }
}

