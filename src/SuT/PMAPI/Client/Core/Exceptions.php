<?php
/*
	exceptions.inc: exception classes for the PMAPI.

	Part of the Sign-Up.to Permission Marketing API v0.1 Redistributable.


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

abstract class Exception extends \Exception
{ /* nothing */
}


class RuntimeEnvironmentException extends Exception
{ /* nothing */
}


class CURLException extends Exception
{ /* nothing */
}


class InvalidResponseException extends Exception
{
    public function __construct($what)
    {
        parent::__construct("Invalid server response: $what");
    }
}


class UnsupportedMethodException extends Exception
{
    public function __construct($method)
    {
        parent::__construct("Unsupported method '$method'");
    }
}


class InvalidValueException extends Exception
{
    public function __construct($field, $value)
    {
        parent::__construct("Invalid $field value '$value'");
    }
}


class NoSuchFieldException extends Exception
{
    public function __construct($field)
    {
        parent::__construct("No such field '$field'");
    }
}


class InvalidArgumentException extends Exception
{
    public function __construct($key, $val)
    {
        parent::__construct("Invalid argument '$key' and value '$val'");
    }
}

