<?php
namespace SuT\PMAPI\Client\Endpoint;

class EmailOptIn extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'EmailOptIn';
    protected $_allowPUT = false;


    protected $_attributesGET = array(
        // Unique ID of the resource.
        'id' => array(
            'type' => 'int',
        ),
        // Whether the opt-in email has been sent.
        'completed' => array(
            'type' => 'bool',
        ),
        // Whether the subscriber has confirmed the opt-in.
        'confirmed' => array(
            'type' => 'bool',
        ),
        // Whether the opt-in encountered an error.
        'error' => array(
            'type' => 'bool',
        ),
        // An enum of an error, if one occurred. Possible values: 'Failed', 'Blacklisted', 'Hard bounce', 'Soft bounce'.
        'errortype' => array(
            'type' => 'enum/null',
        ),
        // Unique ID of the list.
        'list_id' => array(
            'type' => 'int',
        ),
        // ID of a message containing the required email link code. If no message_id is specified then the default opt-in email is sent instead.
        'message_id*' => array(
            'type' => 'int/null',
        ),
        // Direct the user to this URL once they have accepted the opt-in. If no redirectionurl is specified the user will see the default confirmation page.
        'redirectionurl*' => array(
            'type' => 'string/null',
        ),
        // Unique ID of the subscriber.
        'subscriber_id' => array(
            'type' => 'int',
        ),
        // Unique ID of the subscription.
        'subscription_id' => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate' => array(
            'type' => 'decimal',
        ),
    );

    protected $_attributesPOST = array(
        // Unique ID of the list.
        'list_id' => array(
            'type' => 'int',
        ),
        // ID of a message containing the required email link code. If no message_id is specified then the default opt-in email is sent instead.
        'message_id*' => array(
            'type' => 'int/null',
        ),
        // Direct the user to this URL once they have accepted the opt-in. If no redirectionurl is specified the user will see the default confirmation page.
        'redirectionurl*' => array(
            'type' => 'string/null',
        ),
        // Unique ID of the subscriber.
        'subscriber_id' => array(
            'type' => 'int',
        ),
        // Unique ID of the subscription.
        'subscription_id' => array(
            'type' => 'int',
        ),
    );
}
