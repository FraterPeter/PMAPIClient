<?php
/*
	class PartnerAuthHash: represents a company ID / API hash authentication context.

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
		X-SuT-PID: 12345\r\n
		X-SuT-Nonce: 0123456789abcdef0123456789abcdef01234567\r\n

	Signature = sha1(signature_string . api_hash); then:

		Authorization: SuTPartner signature="0123456789abcdef0123456789abcdef01234567"
*/

namespace SuT\PMAPI\Client\Core;

class PartnerAuthHash extends Auth
{
    protected $pid;
    protected $hash;
    protected $cid;
    protected $uid = null;

    const SUT_API_HASH_LEN = 40;


    public function __construct($partnerID, $hash, $companyID = null, $userID = null)
    {
        if (!is_numeric($partnerID) || ($partnerID < 1))
        {
            throw new InvalidValueException('Partner ID', $partnerID);
        }

        $this->pid = (int) $partnerID;

        if ((strlen($hash) != self::SUT_API_HASH_LEN))
        {
            throw new InvalidValueException('API hash', $hash);
        }

        $this->hash = $hash;

        if (!is_null($companyID))
        {
            $this->setCompanyID($companyID);
        }

        if (!is_null($userID))
        {
            $this->setUserID($userID);
        }
    }


    public function getHeaders($verb, $version, $endpoint)
    {
        if ($this->cid)
        {
            if (!$this->uid)
            {
                $headers = array
                (
                    'Date'        => $this->getDate(),
                    'X-SuT-PID'   => $this->pid,
                    'X-SuT-CID'   => $this->cid,
                    'X-SuT-Nonce' => $this->getNonce()
                );
            }
            else
            {
                $headers = array
                (
                    'Date'        => $this->getDate(),
                    'X-SuT-PID'   => $this->pid,
                    'X-SuT-CID'   => $this->cid,
                    'X-SuT-UID'   => $this->uid,
                    'X-SuT-Nonce' => $this->getNonce()
                );
            }
        }
        else
        {
            $headers = array
            (
                'Date'        => $this->getDate(),
                'X-SuT-PID'   => $this->pid,
                'X-SuT-Nonce' => $this->getNonce()
            );
        }

        $headers_ = array(strtoupper($verb) . " /v$version/$endpoint");

        foreach ($headers as $header => $value)
        {
            $headers_[] = "$header: $value";
        }

        $headers_[]               = $this->hash;
        $sig_string               = join("\r\n", $headers_);
        $signature                = sha1($sig_string);
        $headers['Authorization'] = "SuTPartner signature=\"$signature\"";

        return $headers;
    }


    public function setCompanyID($companyID = null)
    {
        if (is_null($companyID))
        {
            $this->unsetCompanyID();
        }

        if (!is_numeric($companyID) || ($companyID < 1))
        {
            throw new InvalidValueException('Company ID', $companyID);
        }

        $this->cid = (int) $companyID;
    }


    public function unsetCompanyID()
    {
        $this->cid = null;
    }


    public function setUserID($userID = null)
    {
        if (is_null($userID))
        {
            $this->unsetUserID();
        }

        if (!is_numeric($userID) || ($userID < 1))
        {
            throw new InvalidValueException('User ID', $userID);
        }

        $this->uid = (int) $userID;
    }


    public function unsetUserID()
    {
        $this->uid = null;
    }
}