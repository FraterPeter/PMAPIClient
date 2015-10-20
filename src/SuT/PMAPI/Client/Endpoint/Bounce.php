<?php
namespace SuT\PMAPI\Client\Endpoint;

class Bounce extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Bounce';
    protected $_allowPUT = false;
    protected $_allowPOST = true;

    protected $_attributesGET = array(
        // Unique ID of the bounce event.
        'id' => array(
            'type' => 'int',
        ),
        // Send channel: "email" or "sms".
        'channel' => array(
            'type' => 'enum',
        ),
        // Error returned by the peer server after delivery was attempted.
        'error' => array(
            'type' => 'string',
        ),
        // Unique ID of the subscriber to whom the bounced message was sent.
        'subscriber_id' => array(
            'type' => 'int',
        ),
        // If channel = "email", the email address of the subscriber to whom the bounced message was sent; null otherwise.
        'email' => array(
            'type' => 'string/null',
        ),
        // If channel = "sms", the MSISDN (see definition) of the subscriber to whom the bounced message was sent; null otherwise.
        'msisdn' => array(
            'type' => 'string/null',
        ),
        // Unique ID of the task from which the bounce occurred.
        'task_id' => array(
            'type' => 'int',
        ),
        // The type of bounce: "hard" or "soft".
        'type' => array(
            'type' => 'enum',
        ),
        // Timestamp at which the bounce occurred.
        'cdate' => array(
            'type' => 'decimal ',
        ),
    );
}
