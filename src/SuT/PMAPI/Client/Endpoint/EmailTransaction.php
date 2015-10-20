<?php
namespace SuT\PMAPI\Client\Endpoint;

class EmailTransaction extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'EmailTransaction';
    protected $_allowPUT = false;

    protected $_attributesGET = array(
        // Unique ID of the resource.
        'id'            => array(
            'type' => 'int',
        ),
        // Recipient subscriber id.
        'subscriber_id' => array(
            'type' => 'int/null ',
        ),
        // Recipient email address.
        'email'         => array(
            'type' => 'string/null',
        ),
        // Email subject.
        'subject'       => array(
            'type' => 'string',
        ),
        // Email html body.
        'bodyhtml'      => array(
            'type' => 'text/null',
        ),
        // Email text body.
        'bodytext'      => array(
            'type' => 'text/null ',
        ),
        // Email from address subject (defaults to noreply@).
        'fromemail'     => array(
            'type' => 'string/null ',
        ),
        // Email from name (defaults to company name).
        'fromname'      => array(
            'type' => 'string/null ',
        ),
        // Whether the opt-in email has been sent.
        'completed'     => array(
            'type' => 'bool',
        ),
        // Whether the opt-in encountered an error.
        'error'         => array(
            'type' => 'bool',
        ),
        // An enum of an error, if one occured. Possible values: 'Failed', 'Blacklisted', 'Hard bounce', 'Soft bounce'.
        'errortype'     => array(
            'type' => 'enum/null ',
        ),
        // Creation timestamp.
        'cdate'         => array(
            'type' => 'decimal',
        ),
    );

    protected $_attributesPOST = array(
        // Recipient subscriber id.
        'subscriber_id' => array(
            'type' => 'int/null ',
        ),
        // Recipient email address.
        'email'         => array(
            'type' => 'string/null',
        ),
        // Email subject.
        'subject'       => array(
            'type' => 'string',
        ),
        // Email html body.
        'bodyhtml'      => array(
            'type' => 'text/null',
        ),
        // Email text body.
        'bodytext'      => array(
            'type' => 'text/null ',
        ),
        // Email from address subject (defaults to noreply@).
        'fromemail'     => array(
            'type' => 'string/null ',
        ),
        // Email from name (defaults to company name).
        'fromname'      => array(
            'type' => 'string/null ',
        ),
    );
}
