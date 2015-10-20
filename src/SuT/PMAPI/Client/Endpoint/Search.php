<?php
namespace SuT\PMAPI\Client\Endpoint;

class Search extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Search';

    protected $_attributesGET = array(
        // Unique ID of the resource.
        'id'          => array(
            'type' => 'int',
        ),
        // XML representing a subscriber search query. (docs coming soon).
        'expression'  => array(
            'type' => 'string',
        ),
        // A user-specified description of the search. Maximum length is 255 octets.
        'description' => array(
            'type' => 'string/null',
        ),
        // The name of the search. Maximum length is 64 octets.
        'name'        => array(
            'type' => 'string',
        ),
        // The type of search: "audience" or "lookup". Defaults to "audience".
        'type'        => array(
            'type' => 'enum',
        ),
        // ID of the user who created the search.
        'user_id'     => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate'       => array(
            'type' => 'decimal',
        ),
        // Last modification timestamp.
        'mdate'       => array(
            'type' => 'decimal',
        ),
    );

    protected $_attributesPOST = array(
        // XML representing a subscriber search query. (docs coming soon).
        'expression'  => array(
            'type' => 'string',
        ),
        // A user-specified description of the search. Maximum length is 255 octets.
        'description' => array(
            'type' => 'string/null',
        ),
        // The name of the search. Maximum length is 64 octets.
        'name'        => array(
            'type' => 'string',
        ),
        // The type of search: "audience" or "lookup". Defaults to "audience".
        'type'        => array(
            'type' => 'enum',
        ),
    );

    protected $_attributesPUT = array(
        // XML representing a subscriber search query. (docs coming soon).
        'expression'  => array(
            'type' => 'string',
        ),
        // A user-specified description of the search. Maximum length is 255 octets.
        'description' => array(
            'type' => 'string/null',
        ),
        // The name of the search. Maximum length is 64 octets.
        'name'        => array(
            'type' => 'string',
        ),
    );
}
