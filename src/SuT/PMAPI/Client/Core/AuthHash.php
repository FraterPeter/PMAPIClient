<?php
/*
	class AuthHash: represents a company ID / API hash authentication context.

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


	Signature-generation string format:

		GET /v1/category\r\n
		Date: Sat, 09 Sep 1989 11:00:00 GMT\r\n
		X-SuT-CID: 12345\r\n
		X-SuT-UID: 678\r\n
		X-SuT-Nonce: 0123456789abcdef0123456789abcdef01234567\r\n

	Signature = sha1(signature_string . api_hash); then:

		Authorization: SuTHash signature="0123456789abcdef0123456789abcdef01234567"
*/

namespace SuT\PMAPI\Client\Core;

class AuthHash extends Auth
{
    protected $uid;
    protected $cid;
    protected $hash;

    const SUT_API_HASH_LEN = 32;


    public function __construct($uid, $cid, $hash)
    {
        $this->uid = (int) $uid;
        if ($this->uid < 1)
        {
            throw new InvalidValueException('user ID', $uid);
        }

        $this->cid = (int) $cid;
        if ($this->cid < 1)
        {
            throw new InvalidValueException('company ID', $cid);
        }

        if ((strlen($hash) != self::SUT_API_HASH_LEN)
            || (strspn($hash, '0123456789abcdef') != self::SUT_API_HASH_LEN)
        )
        {
            throw new InvalidValueException('API hash', $hash);
        }

        $this->hash = $hash;
    }


    public function getHeaders($verb, $version, $endpoint)
    {
        $headers = array
        (
            'Date'        => $this->getDate(),
            'X-SuT-CID'   => $this->cid,
            'X-SuT-UID'   => $this->uid,
            'X-SuT-Nonce' => $this->getNonce()
        );

        $headers_ = array(strtoupper($verb) . " /v$version/$endpoint");
        foreach ($headers as $header => $value)
            $headers_[] = "$header: $value";
        $headers_[] = $this->hash;

        $sig_string = join("\r\n", $headers_);
        $signature  = sha1($sig_string);

        $headers['Authorization'] = "SuTHash signature=\"$signature\"";

        return $headers;
    }
}

