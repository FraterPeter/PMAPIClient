<?php
namespace SuT\PMAPI\Client\Endpoint;

class SearchExecute extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'SearchExecute';
    protected $_allowPUT = false;


    protected $_attributesGET = array(
        // Unique ID of the resource.
        'id'               => array(
            'type' => 'int',
        ),
        // False if search processing has not yet started, or if search processing is underway; true if search processing has completed (whether successfully or unsuccessfully).
        'completed'        => array(
            'type' => 'bool',
        ),
        // If an error occurs when processing a search, this attribute will contain a human-readable description of the error. If the search completes successfully, this attribute will return an empty string. If the search has not yet completed, this attribute will return null.
        'error'            => array(
            'type' => 'string/null',
        ),
        // If an error occurs when processing a search, this attribute will contain a numeric error code. If the search completes successfully, this attribute will return zero (0). If the search has not yet completed, this attribute will return null.
        'errorcode'        => array(
            'type' => 'int/null',
        ),
        // ID of a list to which subscribers matching the search should be added.
        'list_id'          => array(
            'type' => 'int/null',
        ),
        // Approximate progress of search processing, in the range 0-1. When search processing starts, this attribute will return zero (0); the returned value will increase towards 1 as the search is executed. This attribute will return null if a search has failed, or has not yet been run.
        'progress'         => array(
            'type' => 'decimal/null',
        ),
        // ID of the search to execute.
        'search_id'        => array(
            'type' => 'int',
        ),
        // Whether to temporarily store the results e.g. for exporting or a subscriber lookup.
        'store'            => array(
            'type' => 'bool',
        ),
        // The number of subscribers matched by the search criteria and visible to the user who executed the search.
        'subscriber_count' => array(
            'type' => 'int/null',
        ),
        // ID of the user who requested execution of the search.
        'user_id'          => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate'            => array(
            'type' => 'decimal',
        ),
        // Last modification timestamp.
        'mdate'            => array(
            'type' => 'decimal',
        ),
    );

    protected $_attributesPOST = array(
        // ID of a list to which subscribers matching the search should be added.
        'list_id'   => array(
            'type' => 'int/null',
        ),
        // ID of the search to execute.
        'search_id' => array(
            'type' => 'int',
        ),
        // Whether to temporarily store the results e.g. for exporting or a subscriber lookup.
        'store'     => array(
            'type' => 'bool',
        ),
    );
}
