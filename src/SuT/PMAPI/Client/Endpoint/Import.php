<?php
namespace SuT\PMAPI\Client\Endpoint;

class Import extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Import';
    protected $_attributesPUT = array();


    protected $_attributesGET = array(
        // Unique ID of the import.
        'id' => array(
            'type' => 'int',
        ),
        // Flag indicating whether import processing has completed. Please note that "true" indicates that the import completed, but does not indicate that it did so successfully.
        'completed' => array(
            'type' => 'bool',
        ),
        // Free-form system-generated text describing an error that prevented the import from completing. Null if the import has not yet been processed, or if it was processed successfully.
        'error' => array(
            'type' => 'string/null',
        ),
        // Code associated with the error in the "error" attribute. Null if the import has not yet been processed, or if it was processed successfully.
        'errorcode' => array(
            'type' => 'int/null',
        ),
        // ID of the list into which data is to be imported.
        'list_id' => array(
            'type' => 'int',
        ),
        // Number of records found in the data file.
        'recordcount' => array(
            'type' => 'int/null',
        ),
        // URL of data to be imported, either "http" or "https".
        'source' => array(
            'type' => 'string/null',
        ),
        // Attribute update mode. Specifies the behaviour for data attributes: one of "add" (do not overwrite existing attribute data), "overwrite" (overwrite existing data), "delete" (blank input attributes cause deletion of existing data).
        'updatemode' => array(
            'type' => 'enum',
        ),
        // ID of the user who created the import.
        'user_id' => array(
            'type' => 'int',
        ),
        // Timestamp at which the import was created.
        'cdate' => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // ID of the list into which data is to be imported.
        'list_id' => array(
            'type' => 'int',
        ),
        // URL of data to be imported, either "http" or "https".
        'source' => array(
            'type' => 'string/null',
        ),
        // Attribute update mode. Specifies the behaviour for data attributes: one of "add" (do not overwrite existing attribute data), "overwrite" (overwrite existing data), "delete" (blank input attributes cause deletion of existing data).
        'updatemode' => array(
            'type' => 'enum',
        ),
    );
}
