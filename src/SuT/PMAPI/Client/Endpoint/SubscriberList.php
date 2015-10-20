<?php
namespace SuT\PMAPI\Client\Endpoint;

class SubscriberList extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'List';

    protected $_attributesGET = array(
        // Unique ID of the list.
        'id' => array(
            'type' => 'int',
        ),
        // Number of Marketing Automation rules associated with this list.
        'automation_count' => array(
            'type' => 'int',
        ),
        // Flag indicating whether this list may be deleted. If "false", this resource must be treated as read-only.
        'deletable' => array(
            'type' => 'bool',
        ),
        // Unique ID of the folder containing this list.
        'folder_id' => array(
            'type' => 'int',
        ),
        // Number of forms attached to this list.
        'form_count' => array(
            'type' => 'int',
        ),
        // List name.
        'name' => array(
            'type' => 'string',
        ),
        // Free-text note for this list. Null if no note has been stored.
        'note' => array(
            'type' => 'string/null',
        ),
        // Flag indicating whether this list is linked to an optinautomation rule.
        'optin' => array(
            'type' => 'bool',
        ),
        // Number of SMS Marketing Automation (smsautomation) rules associated with this list.
        'smsautomation_count' => array(
            'type' => 'int',
        ),
        // Flag indicating whether this list receives SMS subscriptions not routed to any other list. Always returns is_deletable = false.
        'smsdefault' => array(
            'type' => 'bool',
        ),
        // Number of subscriptions associated with this list.
        'subscription_count' => array(
            'type' => 'int',
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
        // Unique ID of the folder containing this list.
        'folder_id' => array(
            'type' => 'int',
        ),
        // List name.
        'name' => array(
            'type' => 'string',
        ),
        // Free-text note for this list. Null if no note has been stored.
        'note' => array(
            'type' => 'string/null',
        ),
    );

    protected $_attributesPUT = array(
        // Unique ID of the folder containing this list.
        'folder_id' => array(
            'type' => 'int',
        ),
        // List name.
        'name' => array(
            'type' => 'string',
        ),
        // Free-text note for this list. Null if no note has been stored.
        'note' => array(
            'type' => 'string/null',
        ),
    );
}
