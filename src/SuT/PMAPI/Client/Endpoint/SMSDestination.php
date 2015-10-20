<?php
namespace SuT\PMAPI\Client\Endpoint;

class SMSDestination extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'SmsDestination';

    protected $_attributesGET = array(
        // Unique ID of the destination.
        'id' => array(
            'type' => 'int',
        ),
        // SMS messages starting with this string will be accepted. Not case-sensitive; must not contain spaces; must be 4-64 characters in length.
        'keyword' => array(
            'type' => 'string/null',
        ),
        // The MSISDN or shortcode to which SMS messages must be sent.
        'destination' => array(
            'type' => 'string',
        ),
        // Whether the destination is a shortcode.
        'isshortcode' => array(
            'type' => 'boolean',
        ),
        // Last modification timestamp.
        'mdate' => array(
            'type' => 'decimal/null',
        ),
    );

    protected $_attributesPOST = array();

    protected $_attributesPUT = array(
        // SMS messages starting with this string will be accepted. Not case-sensitive; must not contain spaces; must be 4-64 characters in length.
        'keyword' => array(
            'type' => 'string/null',
        ),
    );
}
