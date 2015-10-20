<?php
namespace SuT\PMAPI\Client\Endpoint;

class User extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'User';

    protected $_attributesGET = array(
        // Unique ID of the user.
        'id' => array(
            'type' => 'int',
        ),
        // Whether the user is active.
        'active' => array(
            'type' => 'bool',
        ),
        // Whether the user is the current user making the request.
        'currentuser' => array(
            'type' => 'bool',
        ),
        // The user's email address.
        'email' => array(
            'type' => 'string',
        ),
        // The user's first name.
        'firstname' => array(
            'type' => 'string',
        ),
        // Whether the user is the admin user.
        'isadmin' => array(
            'type' => 'bool',
        ),
        // Timestamp of when the user last logged into the online platform.
        'lastlogon' => array(
            'type' => 'int/null',
        ),
        // Boolean (triggered by the user failing 3 login attempts in a row).
        'locked' => array(
            'type' => 'bool',
        ),
        // Total number of logins the user has made.
        'logins' => array(
            'type' => 'int',
        ),
        // Mobile number for the user.
        'msisdn' => array(
            'type' => 'string/null',
        ),
        // The user's password (at least seven characters with both letters and numbers).
        'password' => array(
            'type' => 'string/null',
        ),
        // The user's last name (surname).
        'lastname' => array(
            'type' => 'string',
        ),
        // The username for the user.
        'username' => array(
            'type' => 'string',
        ),
        // The user's timezone.
        'timezone' => array(
            'type' => 'string',
        ),
        // Creation timestamp.
        'cdate' => array(
            'type' => 'decimal ',
        ),
        // Last modification timestamp.
        'mdate' => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // Whether the user is active.
        'active' => array(
            'type' => 'bool',
        ),
        // The user's email address.
        'email' => array(
            'type' => 'string',
        ),
        // The user's first name.
        'firstname' => array(
            'type' => 'string',
        ),
        // Mobile number for the user.
        'msisdn' => array(
            'type' => 'string/null',
        ),
        // The user's password (at least seven characters with both letters and numbers).
        'password' => array(
            'type' => 'string/null',
        ),
        // The user's last name (surname).
        'lastname' => array(
            'type' => 'string',
        ),
        // The username for the user.
        'username' => array(
            'type' => 'string',
        ),
    );

    protected $_attributesPUT = array(
        // Whether the user is active.
        'active' => array(
            'type' => 'bool',
        ),
        // The user's email address.
        'email' => array(
            'type' => 'string',
        ),
        // The user's first name.
        'firstname' => array(
            'type' => 'string',
        ),
        // Mobile number for the user.
        'msisdn' => array(
            'type' => 'string/null',
        ),
        // The user's password (at least seven characters with both letters and numbers).
        'password' => array(
            'type' => 'string/null',
        ),
        // The user's last name (surname).
        'lastname' => array(
            'type' => 'string',
        ),
        // The username for the user.
        'username' => array(
            'type' => 'string',
        ),
    );
}
