<?php
namespace SuT\PMAPI\Client\Endpoint;

class EmailTemplate extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'EmailTemplate';

    protected $_attributesGET = array(
        // Unique ID of the email template.
        'id'           => array(
            'type' => 'int',
        ),
        // Template name. Maximum length is 128 octets.
        'name'         => array(
            'type' => 'string',
        ),
        // Description of the template. Maximum length is 255 octets.
        'description'  => array(
            'type' => 'string',
        ),
        // Template HTML content.
        'content'      => array(
            'type' => 'string',
        ),
        // The URL at which a thumbnail preview of the rendered template content can be found. NULL if the thumbnail image has not yet been generated.
        'thumbnailurl' => array(
            'type' => 'string/null',
        ),
        // Template creation timestamp.
        'cdate'        => array(
            'type' => 'decimal',
        ),
        // Last modification timestamp.
        'mdate'        => array(
            'type' => 'decimal',
        ),
    );

    protected $_attributesPOST = array(
        // Template name. Maximum length is 128 octets.
        'name'        => array(
            'type' => 'string',
        ),
        // Description of the template. Maximum length is 255 octets.
        'description' => array(
            'type' => 'string',
        ),
        // Template HTML content.
        'content'     => array(
            'type' => 'string',
        ),
    );

    protected $_attributesPUT = array(
        // Template name. Maximum length is 128 octets.
        'name'        => array(
            'type' => 'string',
        ),
        // Description of the template. Maximum length is 255 octets.
        'description' => array(
            'type' => 'string',
        ),
        // Template HTML content.
        'content'     => array(
            'type' => 'string',
        ),
    );
}
