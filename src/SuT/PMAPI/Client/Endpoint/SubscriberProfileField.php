<?php
namespace SuT\PMAPI\Client\Endpoint;

class SubscriberProfileField extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'SubscriberProfileField';

    protected $_attributesGET = array(
        // Unique ID of the subscriber profile field.
        'id' => array(
            'type' => 'int',
        ),
        // The header used to identify data for this field in imports. Must be unique.
        'columnheader' => array(
            'type' => 'string',
        ),
        // A name for the profile field.
        'name' => array(
            'type' => 'string',
        ),
        // Field type can be "string", "decimal", "date". Default "string".
        'type' => array(
            'type' => 'enum',
        ),
        // Whether data in the field can be updated by Goal Tracking events. Default "false".
        'goaltracking' => array(
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
        // The header used to identify data for this field in imports. Must be unique.
        'columnheader' => array(
            'type' => 'string',
        ),
        // A name for the profile field.
        'name' => array(
            'type' => 'string',
        ),
        // Field type can be "string", "decimal", "date". Default "string".
        'type' => array(
            'type' => 'enum',
        ),
        // Whether data in the field can be updated by Goal Tracking events. Default "false".
        'goaltracking' => array(
            'type' => 'bool',
        ),
    );

    protected $_attributesPUT = array(
        // The header used to identify data for this field in imports. Must be unique.
        'columnheader' => array(
            'type' => 'string',
        ),
        // A name for the profile field.
        'name' => array(
            'type' => 'string',
        ),
        // Whether data in the field can be updated by Goal Tracking events. Default "false".
        'goaltracking' => array(
            'type' => 'bool',
        ),
    );
}
