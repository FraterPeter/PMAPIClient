<?php
namespace SuT\PMAPI\Client\Endpoint;

class SubscriptionAutomation extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'SubscriptionAutomation';

    protected $_attributesGET = array(
        // Unique ID of the Marketing Automation rule.
        'id' => array(
            'type' => 'int',
        ),
        // Whether the rule will trigger at weekends.
        'actiononweekend' => array(
            'type' => 'bool',
        ),
        // Datum used by actiontype, e.g. list ID if actiontype is "movetolist".
        'actiontarget' => array(
            'type' => 'string',
        ),
        // A specific hour for the action to occur, format "HH:00:00".
        'actionhour' => array(
            'type' => 'string/null',
        ),
        // Offset, in minutes, between a matching event and an consequent action.
        'actiontimediff' => array(
            'type' => 'int',
        ),
        // The kind of action to be taken upon a successful match: "copytolist", "email_autoresponder", "movetolist", "notify", "removefromlist", "sms_autoresponder".
        'actiontype' => array(
            'type' => 'enum',
        ),
        // Unique ID of the list used in the match comparison.
        'list_id' => array(
            'type' => 'int',
        ),
        // Rule name.
        'name' => array(
            'type' => 'string',
        ),
        // Whether the rule is paused.
        'paused' => array(
            'type' => 'bool',
        ),
        // English-language description of the rule.
        'summary' => array(
            'type' => 'string/null',
        ),
        // Unique ID of the user who created this rule.
        'user_id' => array(
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
        // Whether the rule will trigger at weekends.
        'actiononweekend' => array(
            'type' => 'bool',
        ),
        // Datum used by actiontype, e.g. list ID if actiontype is "movetolist".
        'actiontarget' => array(
            'type' => 'string',
        ),
        // A specific hour for the action to occur, format "HH:00:00".
        'actionhour' => array(
            'type' => 'string/null',
        ),
        // Offset, in minutes, between a matching event and an consequent action.
        'actiontimediff' => array(
            'type' => 'int',
        ),
        // The kind of action to be taken upon a successful match: "copytolist", "email_autoresponder", "movetolist", "notify", "removefromlist", "sms_autoresponder".
        'actiontype' => array(
            'type' => 'enum',
        ),
        // Unique ID of the list used in the match comparison.
        'list_id' => array(
            'type' => 'int',
        ),
        // Rule name.
        'name' => array(
            'type' => 'string',
        ),
        // Whether the rule is paused.
        'paused' => array(
            'type' => 'bool',
        ),
        // English-language description of the rule.
        'summary' => array(
            'type' => 'string/null',
        ),
    );

    protected $_attributesPUT = array(
        // Whether the rule will trigger at weekends.
        'actiononweekend' => array(
            'type' => 'bool',
        ),
        // Datum used by actiontype, e.g. list ID if actiontype is "movetolist".
        'actiontarget' => array(
            'type' => 'string',
        ),
        // A specific hour for the action to occur, format "HH:00:00".
        'actionhour' => array(
            'type' => 'string/null',
        ),
        // Offset, in minutes, between a matching event and an consequent action.
        'actiontimediff' => array(
            'type' => 'int',
        ),
        // The kind of action to be taken upon a successful match: "copytolist", "email_autoresponder", "movetolist", "notify", "removefromlist", "sms_autoresponder".
        'actiontype' => array(
            'type' => 'enum',
        ),
        // Unique ID of the list used in the match comparison.
        'list_id' => array(
            'type' => 'int',
        ),
        // Rule name.
        'name' => array(
            'type' => 'string',
        ),
        // Whether the rule is paused.
        'paused' => array(
            'type' => 'bool',
        ),
        // English-language description of the rule.
        'summary' => array(
            'type' => 'string/null',
        ),
    );
}
