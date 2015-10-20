<?php
namespace SuT\PMAPI\Client\Endpoint;

class SMSMessage extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'SmsMessage';

    protected $_attributesGET = array(
        // Unique ID of the message.
        'id' => array(
            'type' => 'int',
        ),
        // Messages are editable until a 'task' has been scheduled.
        'editable' => array(
            'type' => 'int',
        ),
        // The sender's display name - 11 alphanumeric characters or an MSISDN.
        'fromname' => array(
            'type' => 'string ',
        ),
        // SMS message content.
        'message' => array(
            'type' => 'string',
        ),
        // Name of the message - this attribute is for reference only and isn't sent.
        'name' => array(
            'type' => 'string',
        ),
        // Whether to include SMS unsubscription information in the message. Default is 'false'.
        'subinfo' => array(
            'type' => 'bool',
        ),
        // Whether a message has been used in a scheduled task.
        'used' => array(
            'type' => 'bool',
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
        // The sender's display name - 11 alphanumeric characters or an MSISDN.
        'fromname' => array(
            'type' => 'string ',
        ),
        // SMS message content.
        'message' => array(
            'type' => 'string',
        ),
        // Name of the message - this attribute is for reference only and isn't sent.
        'name' => array(
            'type' => 'string',
        ),
        // Whether to include SMS unsubscription information in the message. Default is 'false'.
        'subinfo' => array(
            'type' => 'bool',
        ),
    );

    protected $_attributesPUT = array(
        // The sender's display name - 11 alphanumeric characters or an MSISDN.
        'fromname' => array(
            'type' => 'string ',
        ),
        // SMS message content.
        'message' => array(
            'type' => 'string',
        ),
        // Name of the message - this attribute is for reference only and isn't sent.
        'name' => array(
            'type' => 'string',
        ),
        // Whether to include SMS unsubscription information in the message. Default is 'false'.
        'subinfo' => array(
            'type' => 'bool',
        ),
    );
}
