<?php
/*
	class Auth: represents an authentication context

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

abstract class Auth
{
    const DATE_RFC1123 = '%a, %d %b %Y %H:%M:%S'; // %h (alias of %b) does not work on win32.


    abstract public function getHeaders($verb, $version, $endpoint);


    protected function getDate()
    {
        // The HTTP "Date:" header must contain an English-language string.  If the current date/
        // time locale is not en_*, attempt to change it in order to format the "Date:" header
        // correctly.
        $locale_changed = false;
        $time_locale    = setlocale(LC_TIME, '0');
        if (strpos('en_', $time_locale) !== 0)
        {
            // Try to select any English-language locale for date/times.
            if (!setlocale(LC_TIME, array(
                'en_US',
                'en_US.utf8',
                'en_GB',
                'en_GB.utf8',
                'en_CA',
                'en_CA.utf8',
                'en_AU',
                'en_AU.utf8',
                'en_NZ',
                'en_NZ.utf8',
                'eng',
                'english-uk',
                'uk',
                'american',
                'american english',
                'american-english',
                'english-american',
                'english-us',
                'english-usa',
                'us'
            )))
            {
                throw new RuntimeEnvironmentException("Cannot set en_* locale for request");
            }

            $locale_changed = true;
        }

        $sDate = gmstrftime(self::DATE_RFC1123 . ' GMT');

        // If the date/time locale was changed above, attempt to restore the original setting.
        if ($locale_changed)
        {
            setlocale(LC_TIME, $time_locale);
        }

        return $sDate;
    }


    protected function getNonce()
    {
        return sha1(uniqid(mt_rand(), true));
    }
}

