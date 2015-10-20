<?php
namespace SuT\PMAPI\Client\Endpoint;

class OptinAutomation extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'OptinAutomation';

    protected $_attributesGET = array(
        // Unique ID of the Marketing Automation rule.
        'id'         => array(
            'type' => 'int',
        ),
        // Unique ID of the list used in the match comparison.
        'list_id'    => array(
            'type' => 'int/null',
        ),
        // Unique ID of the message used as the opt-in email.
        'message_id' => array(
            'type' => 'int',
        ),
        // Rule name.
        'name'       => array(
            'type' => 'string',
        ),
        // Whether the rule is paused.
        'paused'     => array(
            'type' => 'bool',
        ),
        // English-language description of the rule.
        'summary'    => array(
            'type' => 'string/null',
        ),
        // Unique ID of the user who created this rule.
        'user_id'    => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate'      => array(
            'type' => 'decimal ',
        ),
        // Last modification timestamp.
        'mdate'      => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // Unique ID of the list used in the match comparison.
        'list_id'    => array(
            'type' => 'int/null',
        ),
        // Unique ID of the message used as the opt-in email.
        'message_id' => array(
            'type' => 'int',
        ),
        // Rule name.
        'name'       => array(
            'type' => 'string',
        ),
        // Whether the rule is paused.
        'paused'     => array(
            'type' => 'bool',
        ),
        // English-language description of the rule.
        'summary'    => array(
            'type' => 'string/null',
        ),
    );

    protected $_attributesPUT = array(
        // Unique ID of the message used as the opt-in email.
        'message_id' => array(
            'type' => 'int',
        ),
        // Rule name.
        'name'       => array(
            'type' => 'string',
        ),
        // Whether the rule is paused.
        'paused'     => array(
            'type' => 'bool',
        ),
        // English-language description of the rule.
        'summary'    => array(
            'type' => 'string/null',
        ),
    );
}
