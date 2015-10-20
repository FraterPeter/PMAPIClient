<?php
namespace SuT\PMAPI\Client\Endpoint;

class Automation extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Automation';
    protected $_allowPUT = false;
    protected $_allowPOST = true;


    protected $_attributesGET = array(
        // Unique ID of the Marketing Automation rule.
        'id' => array(
            'type' => 'int',
        ),
        // Type of event that triggers this rule: "subscription", "click", "date", "open".
        'eventtype' => array(
            'type' => 'enum',
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
}
