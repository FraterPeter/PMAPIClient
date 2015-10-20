<?php
namespace SuT\PMAPI\Client\Endpoint;

class EmailLinkClick extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'EmailLinkClick';
    protected $_allowPUT = false;
    protected $_allowPOST = true;


    protected $_attributesGET = array(
        // Unique ID of the link click event.
        'id' => array(
            'type' => 'string',
        ),
        // ID of the link in the message.
        'emailmessagelink_id' => array(
            'type' => 'int',
        ),
        // ID of the subscriber who clicked the link.
        'subscriber_id' => array(
            'type' => 'int',
        ),
        // ID of the task containing the link.
        'task_id' => array(
            'type' => 'int',
        ),
        // Timestamp at which the click occurred.
        'cdate' => array(
            'type' => 'decimal ',
        ),
    );
}
