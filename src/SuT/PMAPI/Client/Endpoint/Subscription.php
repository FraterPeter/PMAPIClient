<?php
namespace SuT\PMAPI\Client\Endpoint;

class Subscription extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Subscription';

    protected $_attributesGET = array(
        // Unique ID of the subscription.
        'id'                   => array(
            'type' => 'int',
        ),
        // An optional URL to redirect the subscriber to after they have confirmed their subscription.
        'confirmationredirect' => array(
            'type' => 'string',
        ),
        // Whether the subscription has been confirmed via confirmed opt-in. Cannot be set to "false" if value is "true".
        'confirmed'            => array(
            'type' => 'bool',
        ),
        // Unique ID of the list.
        'list_id'              => array(
            'type' => 'int',
        ),
        // A short descriptor for the source of the subscription: "form", "sms", "api", "import", "automation", "other".
        'source'               => array(
            'type' => 'enum',
        ),
        // Unique ID of the subscriber.
        'subscriber_id'        => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate'                => array(
            'type' => 'decimal ',
        ),
        // Last modification timestamp.
        'mdate'                => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // An optional URL to redirect the subscriber to after they have confirmed their subscription.
        'confirmationredirect' => array(
            'type' => 'string',
        ),
        // Whether the subscription has been confirmed via confirmed opt-in. Cannot be set to "false" if value is "true".
        'confirmed'            => array(
            'type' => 'bool',
        ),
        // Unique ID of the list.
        'list_id'              => array(
            'type' => 'int',
        ),
        // Unique ID of the subscriber.
        'subscriber_id'        => array(
            'type' => 'int',
        ),
    );

    protected $_attributesPUT = array(
        // An optional URL to redirect the subscriber to after they have confirmed their subscription.
        'confirmationredirect' => array(
            'type' => 'string',
        ),
        // Whether the subscription has been confirmed via confirmed opt-in. Cannot be set to "false" if value is "true".
        'confirmed'            => array(
            'type' => 'bool',
        ),
    );
}
