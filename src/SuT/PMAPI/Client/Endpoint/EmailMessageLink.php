<?php
namespace SuT\PMAPI\Client\Endpoint;

class EmailMessageLink extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'EmailMessageLink';
    protected $_allowPUT = false;
    protected $_allowPOST = false;


    protected $_attributesGET = array(
        // Unique ID of the message link.
        'id' => array(
            'type' => 'int',
        ),
        // ID of the message.
        'message_id' => array(
            'type' => 'int ',
        ),
        // For personalised links, the name assigned to the link.
        'name' => array(
            'type' => 'string/null ',
        ),
        // Link destination URL.
        'target' => array(
            'type' => 'string',
        ),
        // Unique ID of the task.
        'task_id' => array(
            'type' => 'int',
        ),
        // Message part containing the link - "html" / "text".
        'type' => array(
            'type' => 'enum ',
        ),
        // Creation timestamp.
        'cdate' => array(
            'type' => 'decimal',
        ),
    );
}
