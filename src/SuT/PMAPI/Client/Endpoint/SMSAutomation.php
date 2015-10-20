<?php
namespace SuT\PMAPI\Client\Endpoint;

class SMSAutomation extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'SmsAutomation';

    protected $_attributesGET = array(
        // Unique ID of the resource.
        'id' => array(
            'type' => 'int',
        ),
        // If non-null, the ID of a list to which the sender's email address should be added, if the MO contains an email address.
        'email_list_id' => array(
            'type' => 'null/int',
        ),
        // Sub-keyword on which to match, or null to catch all unmatched MO messages. Case-insensitive. Must be 1-32 characters in length.
        'keyword' => array(
            'type' => 'null/string',
        ),
        // ID of the list to which the message sender's MSISDN should be added.
        'list_id' => array(
            'type' => 'int',
        ),
        // If non-null, the ID of an SMS auto-responder campaign to be sent to the MO sender.
        'message_id' => array(
            'type' => 'null/int',
        ),
        // If non-null, the hour (format "HH:00:00") at which the SMS auto-responder campaign (if one has been set) should be sent to the MO sender.
        'message_actionhour' => array(
            'type' => 'null/string',
        ),
        // If non-null, the offset (in seconds) between receipt of a matching MO message and the despatch of an SMS auto-responder.
        'message_actiontimediff' => array(
            'type' => 'null/int',
        ),
        // Defaults to null.&nbsp;Whether the rule will trigger at weekends, for 'message_id'.
        'message_actiononweekend' => array(
            'type' => 'null/bool',
        ),
        // A free-form name used to identify the rule.
        'name' => array(
            'type' => 'string',
        ),
        // If non-null, an email address to which the contents of a matching MO message will be sent.
        'notifyemail' => array(
            'type' => 'null/string',
        ),
        // If non-null, a MSISDN to which a matching MO message will be forwarded.
        'notifymsisdn' => array(
            'type' => 'null/string',
        ),
        // If non-null, a URL which will receive a GET request whenever a matching MO message is received.
        'notifyurl' => array(
            'type' => 'null/string',
        ),
        // If true, the rule is paused (i.e. matches will not occur); if false, the rule is active.
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
        // If non-null, the ID of a list to which the sender's email address should be added, if the MO contains an email address.
        'email_list_id' => array(
            'type' => 'null/int',
        ),
        // Sub-keyword on which to match, or null to catch all unmatched MO messages. Case-insensitive. Must be 1-32 characters in length (though we recommend using at least 4).
        'keyword' => array(
            'type' => 'null/string',
        ),
        // ID of the list to which the message sender's MSISDN should be added.
        'list_id' => array(
            'type' => 'int',
        ),
        // If non-null, the ID of an SMS auto-responder campaign to be sent to the MO sender.
        'message_id' => array(
            'type' => 'null/int',
        ),
        // If non-null, the hour (format "HH:00:00") at which the SMS auto-responder campaign (if one has been set) should be sent to the MO sender.
        'message_actionhour' => array(
            'type' => 'null/string',
        ),
        // If non-null, the offset (in seconds) between receipt of a matching MO message and the despatch of an SMS auto-responder.
        'message_actiontimediff' => array(
            'type' => 'null/int',
        ),
        // Defaults to null.&nbsp;Whether the rule will trigger at weekends, for 'message_id'.
        'message_actiononweekend' => array(
            'type' => 'null/bool',
        ),
        // A free-form name used to identify the rule.
        'name' => array(
            'type' => 'string',
        ),
        // If non-null, an email address to which the contents of a matching MO message will be sent.
        'notifyemail' => array(
            'type' => 'null/string',
        ),
        // If non-null, a MSISDN to which a matching MO message will be forwarded.
        'notifymsisdn' => array(
            'type' => 'null/string',
        ),
        // If non-null, a URL which will receive a GET request whenever a matching MO message is received.
        'notifyurl' => array(
            'type' => 'null/string',
        ),
        // If true, the rule is paused (i.e. matches will not occur); if false, the rule is active.
        'paused' => array(
            'type' => 'bool',
        ),
        // English-language description of the rule.
        'summary' => array(
            'type' => 'string/null',
        ),
    );

    protected $_attributesPUT = array(
        // If non-null, the ID of a list to which the sender's email address should be added, if the MO contains an email address.
        'email_list_id' => array(
            'type' => 'null/int',
        ),
        // Sub-keyword on which to match, or null to catch all unmatched MO messages. Case-insensitive. Must be 1-32 characters in length (though we recommend using at least 4).
        'keyword' => array(
            'type' => 'null/string',
        ),
        // ID of the list to which the message sender's MSISDN should be added.
        'list_id' => array(
            'type' => 'int',
        ),
        // If non-null, the ID of an SMS auto-responder campaign to be sent to the MO sender.
        'message_id' => array(
            'type' => 'null/int',
        ),
        // If non-null, the hour (format "HH:00:00") at which the SMS auto-responder campaign (if one has been set) should be sent to the MO sender.
        'message_actionhour' => array(
            'type' => 'null/string',
        ),
        // If non-null, the offset (in seconds) between receipt of a matching MO message and the despatch of an SMS auto-responder.
        'message_actiontimediff' => array(
            'type' => 'null/int',
        ),
        // Defaults to null.&nbsp;Whether the rule will trigger at weekends, for 'message_id'.
        'message_actiononweekend' => array(
            'type' => 'null/bool',
        ),
        // A free-form name used to identify the rule.
        'name' => array(
            'type' => 'string',
        ),
        // If non-null, an email address to which the contents of a matching MO message will be sent.
        'notifyemail' => array(
            'type' => 'null/string',
        ),
        // If non-null, a MSISDN to which a matching MO message will be forwarded.
        'notifymsisdn' => array(
            'type' => 'null/string',
        ),
        // If non-null, a URL which will receive a GET request whenever a matching MO message is received.
        'notifyurl' => array(
            'type' => 'null/string',
        ),
        // If true, the rule is paused (i.e. matches will not occur); if false, the rule is active.
        'paused' => array(
            'type' => 'bool',
        ),
        // English-language description of the rule.
        'summary' => array(
            'type' => 'string/null',
        ),
    );
}
