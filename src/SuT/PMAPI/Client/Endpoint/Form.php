<?php
namespace SuT\PMAPI\Client\Endpoint;

class Form extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Form';
    protected $_allowPUT = false;
    protected $_allowPOST = false;


    protected $_attributesGET = array(
        // Unique ID of the form.
        'id'            => array(
            'type' => 'int',
        ),
        // Google Analytics tracking code.
        'gacode'        => array(
            'type' => 'string',
        ),
        // Form name.
        'name'          => array(
            'type' => 'string',
        ),
        // Does not send the subscriber an opt-in email if they have an existing subscription.
        'suppressoptin' => array(
            'type' => 'int',
        ),
        // Unique ID of the user who created this form.
        'user_id'       => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate'         => array(
            'type' => 'decimal ',
        ),
        // Last modification timestamp.
        'mdate'         => array(
            'type' => 'decimal ',
        ),
    );
}
