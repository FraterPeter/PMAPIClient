<?php
namespace SuT\PMAPI\Client\Endpoint;

class LoginToken extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'LoginToken';
    protected $_allowPUT = false;


    protected $_attributesGET = array(
        // Unique ID of the resource.
        'id' => array(
            'type' => 'int',
        ),
        // The service this token will be used by (currently only "sutclientapp", which is the Sign-Up.to client application).
        'service' => array(
            'type' => 'enum',
        ),
        // The generated login token.
        'token' => array(
            'type' => 'string',
        ),
        // The user id of the user that created this login token.
        'user_id' => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate' => array(
            'type' => 'decimal',
        ),
    );

    protected $_attributesPOST = array(
        // The service this token will be used by (currently only "sutclientapp", which is the Sign-Up.to client application).
        'service' => array(
            'type' => 'enum',
        ),
    );
}
