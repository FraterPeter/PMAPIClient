<?php
namespace SuT\PMAPI\Client\Endpoint;

class SMS extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Sms';
    protected $_allowPUT = false;


    protected $_attributesGET = array(
        // Unique ID of the message.
        'id'          => array(
            'type' => 'int',
        ),
        // MSISDN to which the message should be delivered.
        'msisdn'      => array(
            'type' => 'string',
        ),
        // True if the message has been dispatched; false if it is awaiting dispatch.
        'dispatched'  => array(
            'type' => 'bool',
        ),
        // True if the message could not be delivered; false otherwise.
        'failed'      => array(
            'type' => 'bool',
        ),
        // Source address for the message. This can be a MSISDN or up to 11 alphanumeric characters.
        'fromaddress' => array(
            'type' => 'string',
        ),
        // Message body. N.B. messages longer than 160 GSM characters will incur additional SMS credit cost.
        'message'     => array(
            'type' => 'string',
        ),
        // Timestamp at which the message should be sent. If null or omitted in POST, the message will be sent immediately.
        'senddate'    => array(
            'type' => 'decimal /null',
        ),
        // Unique ID of the user who submitted this message. Corresponds to the "id" attribute in the /user endpoint.
        'user_id'     => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate'       => array(
            'type' => 'decimal ',
        ),
        // Last update timestamp.
        'mdate'       => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // MSISDN to which the message should be delivered.
        'msisdn'      => array(
            'type' => 'string',
        ),
        // Source address for the message. This can be a MSISDN or up to 11 alphanumeric characters.
        'fromaddress' => array(
            'type' => 'string',
        ),
        // Message body. N.B. messages longer than 160 GSM characters will incur additional SMS credit cost.
        'message'     => array(
            'type' => 'string',
        ),
        // Timestamp at which the message should be sent. If null or omitted in POST, the message will be sent immediately.
        'senddate'    => array(
            'type' => 'decimal /null',
        ),
    );
}
