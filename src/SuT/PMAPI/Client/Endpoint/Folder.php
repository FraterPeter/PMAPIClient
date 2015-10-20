<?php
namespace SuT\PMAPI\Client\Endpoint;

class Folder extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Folder';

    protected $_attributesGET = array(
        // Unique ID of the folder.
        'id'                 => array(
            'type' => 'int',
        ),
        // Number of lists contained in this folder.
        'list_count'         => array(
            'type' => 'int',
        ),
        // Folder name. Must be between 1 and 40 octets in length.
        'name'               => array(
            'type' => 'string',
        ),
        // Sum of the subscription counts of all lists contained in the folder.
        'subscription_count' => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate'              => array(
            'type' => 'decimal ',
        ),
        // Last modification timestamp.
        'mdate'              => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // Folder name. Must be between 1 and 40 octets in length.
        'name' => array(
            'type' => 'string',
        ),
    );

    protected $_attributesPUT = array(
        // Folder name. Must be between 1 and 40 octets in length.
        'name' => array(
            'type' => 'string',
        ),
    );
}
