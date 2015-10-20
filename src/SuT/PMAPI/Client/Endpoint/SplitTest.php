<?php
namespace SuT\PMAPI\Client\Endpoint;

class SplitTest extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'SplitTest';

    protected $_attributesGET = array(
        // Unique ID of the test.
        'id'             => array(
            'type' => 'int',
        ),
        // Action to be taken when initial test phase is complete: "targetwinner" or "tellme".
        'action'         => array(
            'type' => 'enum',
        ),
        // Whether the split test is cancelled.
        'cancelled'      => array(
            'type' => 'bool',
        ),
        // Whether the split test is completed (including split tests which are tied).
        'completed'      => array(
            'type' => 'bool',
        ),
        // Winning criteria for the test: "open", "click" or "goal".
        'criterion'      => array(
            'type' => 'enum',
        ),
        // Number of hours before assessing and sending the "targetwinner" action.
        'delay'          => array(
            'type' => 'int/null',
        ),
        // ID of the target list.
        'list_id'        => array(
            'type' => 'int/null',
        ),
        // Comma separated list of message IDs (Max. 5 per test).
        'message_ids'    => array(
            'type' => 'string',
        ),
        // The test name.
        'name'           => array(
            'type' => 'string',
        ),
        // Timestamp at which the split test is scheduled.
        'scheduledtime'  => array(
            'type' => 'decimal ',
        ),
        // ID of the target search; defaults to null.
        'search_id'      => array(
            'type' => 'int/null',
        ),
        // Method used to calculate the segment size: "percentage" or "number".
        'segmenttype'    => array(
            'type' => 'enum',
        ),
        // segmenttype's value.
        'segmentvalue'   => array(
            'type' => 'int',
        ),
        // The total number of recipients.
        'size'           => array(
            'type' => 'int',
        ),
        // Whether the split test is tied.
        'tie'            => array(
            'type' => 'bool',
        ),
        // Winning task ID.
        'winner_task_id' => array(
            'type' => 'int/null',
        ),
        // Creation timestamp.
        'cdate'          => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // Unique ID of the test.
        'id'            => array(
            'type' => 'int',
        ),
        // Action to be taken when initial test phase is complete: "targetwinner" or "tellme".
        'action'        => array(
            'type' => 'enum',
        ),
        // Winning criteria for the test: "open", "click" or "goal".
        'criterion'     => array(
            'type' => 'enum',
        ),
        // Number of hours before assessing and sending the "targetwinner" action.
        'delay'         => array(
            'type' => 'int/null',
        ),
        // ID of the target list.
        'list_id'       => array(
            'type' => 'int/null',
        ),
        // Comma separated list of message IDs (Max. 5 per test).
        'message_ids'   => array(
            'type' => 'string',
        ),
        // The test name.
        'name'          => array(
            'type' => 'string',
        ),
        // Timestamp at which the split test is scheduled.
        'scheduledtime' => array(
            'type' => 'decimal ',
        ),
        // ID of the target search; defaults to null.
        'search_id'     => array(
            'type' => 'int/null',
        ),
        // Method used to calculate the segment size: "percentage" or "number".
        'segmenttype'   => array(
            'type' => 'enum',
        ),
        // segmenttype's value.
        'segmentvalue'  => array(
            'type' => 'int',
        ),
    );

    protected $_attributesPUT = array(
        // Whether the split test is cancelled.
        'cancelled' => array(
            'type' => 'bool',
        ),
        // Number of hours before assessing and sending the "targetwinner" action.
        'delay'     => array(
            'type' => 'int/null',
        ),
    );
}
