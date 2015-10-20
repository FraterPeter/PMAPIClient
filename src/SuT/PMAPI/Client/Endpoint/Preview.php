<?php
namespace SuT\PMAPI\Client\Endpoint;

class Preview extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Preview';
    protected $_allowPUT = false;

    protected $_attributesGET = array(
        // Unique ID of the preview.
        'id' => array(
            'type' => 'int',
        ),
        // Unique ID of the message to send.
        'message_id' => array(
            'type' => 'int',
        ),
        // Unique ID of the creator.
        'user_id' => array(
            'type' => 'int',
        ),
        // Unique ID of a subscriber - used for personalisation only. If personalisation exists then the Sign-Up.to platform will populate the message with this subscriber's data. If null or omitted, no personalisation will be applied.
        'subscriber_id' => array(
            'type' => 'int/null',
        ),
        // The preview recipient; email address or MSISDN (depending on the message_id's channel).
        'recipient' => array(
            'type' => 'string',
        ),
        // Whether the preview has been sent.
        'completed' => array(
            'type' => 'bool',
        ),
        // Creation timestamp.
        'cdate' => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // Unique ID of the message to send.
        'message_id' => array(
            'type' => 'int',
        ),
        // Unique ID of a subscriber - used for personalisation only. If personalisation exists then the Sign-Up.to platform will populate the message with this subscriber's data. If null or omitted, no personalisation will be applied.
        'subscriber_id' => array(
            'type' => 'int/null',
        ),
        // The preview recipient; email address or MSISDN (depending on the message_id's channel).
        'recipient' => array(
            'type' => 'string',
        ),
    );
}
