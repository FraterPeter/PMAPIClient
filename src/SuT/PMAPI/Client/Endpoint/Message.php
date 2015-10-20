<?php
namespace SuT\PMAPI\Client\Endpoint;

class Message extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Message';
    protected $_allowPUT = false;
    protected $_allowPOST = false;


    protected $_attributesGET = array(
        // Unique ID of the message.
        'id'           => array(
            'type' => 'int',
        ),
        // Whether the message is a custom opt-in message.
        'customoptin'  => array(
            'type' => 'bool',
        ),
        // Whether the message is the default opt-in message.
        'defaultoptin' => array(
            'type' => 'bool',
        ),
        // Whether the message is editable.
        'editable'     => array(
            'type' => 'bool',
        ),
        // Name of the message.
        'name'         => array(
            'type' => 'string',
        ),
        // Message type: "email" or "sms"
        'type'         => array(
            'type' => 'enum',
        ),
        // Whether a message has been used in a scheduled task.
        'used'         => array(
            'type' => 'bool',
        ),
        // Creation timestamp.
        'cdate'        => array(
            'type' => 'decimal ',
        ),
        // Last modification timestamp.
        'mdate'        => array(
            'type' => 'decimal ',
        ),
    );
}
