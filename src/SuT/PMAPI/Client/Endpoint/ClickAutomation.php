<?php
namespace SuT\PMAPI\Client\Endpoint;

class ClickAutomation extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'ClickAutomation';

    protected $_attributesGET = array(
        // Unique ID of the Marketing Automation rule.
        'id' => array(
            'type' => 'int',
        ),
        // Whether the rule will trigger at weekends.
        'actiononweekend' => array(
            'type' => 'bool',
        ),
        // Datum used by actiontype, e.g. list ID if actiontype is "addtolist".
        'actiontarget' => array(
            'type' => 'string',
        ),
        // A specific time for the action to occur, format "HH:00:00".
        'actionhour' => array(
            'type' => 'string/null',
        ),
        // Offset, in seconds, between a matching event and an consequent action.
        'actiontimediff' => array(
            'type' => 'int',
        ),
        // The kind of action to be taken upon a successful match: "addtolist", "email_autoresponder", "notify", "sms_autoresponder".
        'actiontype' => array(
            'type' => 'enum',
        ),
        // If non-null, the unique ID of the link used in the match comparison.
        'link_id' => array(
            'type' => 'int/null',
        ),
        // If non-null, the unique ID of the message for which all containing links will be used in the match comparison.
        'message_id' => array(
            'type' => 'int/null',
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
        // Datum used by actiontype, e.g. list ID if actiontype is "addtolist".
        'actiontarget' => array(
            'type' => 'string',
        ),
        // A specific time for the action to occur, format "HH:00:00".
        'actionhour' => array(
            'type' => 'string/null',
        ),
        // Offset, in seconds, between a matching event and an consequent action.
        'actiontimediff' => array(
            'type' => 'int',
        ),
        // The kind of action to be taken upon a successful match: "addtolist", "email_autoresponder", "notify", "sms_autoresponder".
        'actiontype' => array(
            'type' => 'enum',
        ),
        // If non-null, the unique ID of the link used in the match comparison.
        'link_id' => array(
            'type' => 'int/null',
        ),
        // If non-null, the unique ID of the message for which all containing links will be used in the match comparison.
        'message_id' => array(
            'type' => 'int/null',
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
        // Datum used by actiontype, e.g. list ID if actiontype is "addtolist".
        'actiontarget' => array(
            'type' => 'string',
        ),
        // A specific time for the action to occur, format "HH:00:00".
        'actionhour' => array(
            'type' => 'string/null',
        ),
        // Offset, in seconds, between a matching event and an consequent action.
        'actiontimediff' => array(
            'type' => 'int',
        ),
        // The kind of action to be taken upon a successful match: "addtolist", "email_autoresponder", "notify", "sms_autoresponder".
        'actiontype' => array(
            'type' => 'enum',
        ),
        // If non-null, the unique ID of the link used in the match comparison.
        'link_id' => array(
            'type' => 'int/null',
        ),
        // If non-null, the unique ID of the message for which all containing links will be used in the match comparison.
        'message_id' => array(
            'type' => 'int/null',
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
