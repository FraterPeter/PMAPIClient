<?php
namespace SuT\PMAPI\Client\Endpoint;

class Task extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Task';

    protected $_attributesGET = array(
        // Unique ID of the task.
        'id' => array(
            'type' => 'int',
        ),
        // Whether the task was cancelled.
        'cancelled' => array(
            'type' => 'bool',
        ),
        // Send channel: "email" or "sms".
        'channel' => array(
            'type' => 'enum',
        ),
        // Whether this task has completed.
        'completed' => array(
            'type' => 'bool',
        ),
        // Number of unique bounces - email channel specific.
        'emailuniquebounces' => array(
            'type' => 'int/null*',
        ),
        // Number of unique clicks - email channel specific.
        'emailuniqueclicks' => array(
            'type' => 'int/null* ',
        ),
        // Number of unique opens - email channel specific.
        'emailuniqueopens' => array(
            'type' => 'int/null* ',
        ),
        // Number of unique unsubscriptions - email channel specific.
        'emailuniqueunsubscriptions' => array(
            'type' => 'int/null* ',
        ),
        // Number of unique complaints - email channel specific.
        'emailuniquecomplaints' => array(
            'type' => 'int/null* ',
        ),
        // Timestamp at which the task finished or was cancelled.
        'endtime' => array(
            'type' => 'decimal /null',
        ),
        // ID of the target list.
        'list_id' => array(
            'type' => 'int/null',
        ),
        // ID of the message associated with this task.
        'message_id' => array(
            'type' => 'int',
        ),
        // Name of the task.
        'name' => array(
            'type' => 'string',
        ),
        // If specified, the maximum rate at which the individual messages comprising the task will be sent; expressed as messages per hour.
        'rate' => array(
            'type' => 'int/null',
        ),
        // Timestamp at which the task was scheduled to start.
        'scheduledtime' => array(
            'type' => 'decimal ',
        ),
        // ID of the target search; defaults to null.
        'search_id' => array(
            'type' => 'int/null ',
        ),
        // Number of recipients at time of task creation.
        'size' => array(
            'type' => 'int',
        ),
        // Number of unique bounces - sms channel specific.
        'smsuniquebounces&nbsp;' => array(
            'type' => 'int/null* ',
        ),
        // The associated split test id.
        'splittest_id' => array(
            'type' => 'int/null',
        ),
        // Creation timestamp.
        'cdate' => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // Send channel: "email" or "sms".
        'channel' => array(
            'type' => 'enum',
        ),
        // ID of the target list.
        'list_id' => array(
            'type' => 'int/null',
        ),
        // ID of the message associated with this task.
        'message_id' => array(
            'type' => 'int',
        ),
        // Name of the task.
        'name' => array(
            'type' => 'string',
        ),
        // If specified, the maximum rate at which the individual messages comprising the task will be sent; expressed as messages per hour.
        'rate' => array(
            'type' => 'int/null',
        ),
        // Timestamp at which the task was scheduled to start.
        'scheduledtime' => array(
            'type' => 'decimal ',
        ),
        // ID of the target search; defaults to null.
        'search_id' => array(
            'type' => 'int/null ',
        ),
    );

    protected $_attributesPUT = array(
        // Whether the task was cancelled.
        'cancelled' => array(
            'type' => 'bool',
        ),
        // ID of the target list.
        'list_id' => array(
            'type' => 'int/null',
        ),
        // Name of the task.
        'name' => array(
            'type' => 'string',
        ),
        // Timestamp at which the task was scheduled to start.
        'scheduledtime' => array(
            'type' => 'decimal ',
        ),
        // ID of the target search; defaults to null.
        'search_id' => array(
            'type' => 'int/null ',
        ),
    );
}
