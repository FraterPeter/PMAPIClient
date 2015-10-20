<?php
namespace SuT\PMAPI\Client\Endpoint;

class Contact extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Contact';
    protected $_allowPUT = false;
    protected $_allowPOST = true;


    protected $_attributesGET = array(
        // Unique ID of the task.
        'task_id' => array(
            'type' => 'int',
        ),
        // Send channel: "email" or "sms".
        'channel' => array(
            'type' => 'enum',
        ),
        // Unique ID of the subscriber.
        'subscriber_id' => array(
            'type' => 'int',
        ),
        // Contact timestamp.
        'cdate' => array(
            'type' => 'decimal ',
        ),
    );
}
