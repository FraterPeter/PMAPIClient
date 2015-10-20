<?php
namespace SuT\PMAPI\Client\Endpoint;

class SubscriberProfileData extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'SubscriberProfileData';

    protected $_attributesGET = array(
        // The unique identifier of the subcriber profile data.
        'id'                        => array(
            'type' => 'string',
        ),
        // The unique identifier of the subscriber to which this record pertains.
        'subscriber_id'             => array(
            'type' => 'int',
        ),
        // The identifier of the subscriber profile field for which this datum stores a value.
        'subscriberprofilefield_id' => array(
            'type' => 'int',
        ),
        // The value stored within this subscriber's instance of the specified field.
        'value'                     => array(
            'type' => 'string',
        ),
    );

    protected $_attributesPOST = array(
        // The unique identifier of the subscriber to which this record pertains.
        'subscriber_id'             => array(
            'type' => 'int',
        ),
        // The identifier of the subscriber profile field for which this datum stores a value.
        'subscriberprofilefield_id' => array(
            'type' => 'int',
        ),
        // The value stored within this subscriber's instance of the specified field.
        'value'                     => array(
            'type' => 'string',
        ),
    );

    protected $_attributesPUT = array(
        // The unique identifier of the subscriber to which this record pertains.
        'subscriber_id'             => array(
            'type' => 'int',
        ),
        // The identifier of the subscriber profile field for which this datum stores a value.
        'subscriberprofilefield_id' => array(
            'type' => 'int',
        ),
        // The value stored within this subscriber's instance of the specified field.
        'value'                     => array(
            'type' => 'string',
        ),
    );
}
