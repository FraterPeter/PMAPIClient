<?php
namespace SuT\PMAPI\Client\Endpoint;

class EmailOpen extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'EmailOpen';
    protected $_allowPUT = false;
    protected $_allowPOST = true;


    protected $_attributesGET = array(
        // Unique ID of the open event.
        'id' => array(
            'type' => 'string',
        ),
        // ID of the subscriber who clicked the link.
        'subscriber_id' => array(
            'type' => 'int',
        ),
        // ID of the task containing the link.
        'task_id' => array(
            'type' => 'int',
        ),
        // Timestamp at which the subscriber opened the message.
        'cdate' => array(
            'type' => 'decimal ',
        ),
    );
}
