<?php
namespace SuT\PMAPI\Client\Endpoint;

class DoNotContact extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'DoNotContact';
    protected $_allowPUT = false;

    protected $_attributesGET = array(
        // Unique ID of the resource.
        'id' => array(
            'type' => 'int',
        ),
        // An email address, domain name or MSISDN (see definition).
        'contactdata' => array(
            'type' => 'string',
        ),
        // Creation timestamp.
        'cdate' => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // An email address, domain name or MSISDN (see definition).
        'contactdata' => array(
            'type' => 'string',
        ),
    );
}
