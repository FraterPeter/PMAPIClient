<?php
namespace SuT\PMAPI\Client\Endpoint;

class EmailMessage extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'EmailMessage';

    protected $_attributesGET = array(
        // Unique ID of the message.
        'id'             => array(
            'type' => 'int',
        ),
        // Whether the message is a custom opt-in email. Defaults to false.
        'customoptin'    => array(
            'type' => 'bool',
        ),
        // Whether the message is the default opt-in email.
        'defaultoptin'   => array(
            'type' => 'bool',
        ),
        // Whether the message is editable.
        'editable'       => array(
            'type' => 'bool',
        ),
        // The source editor. 1= "HTML input", 2="Classic Editor", 3="Campaign Designer", 4="Email Editor".
        'editor'         => array(
            'type' => 'int',
        ),
        // The sender's email address. The value of the attribute must match a pre-configured value in your account on the Sign-Up.to platform. Default is 'null' if no pre-configured addresses exist.
        'fromemail'      => array(
            'type' => 'string/null',
        ),
        // The sender's display name.
        'fromname'       => array(
            'type' => 'string',
        ),
        // Enable 'utm_' data for tracked links in Google Analytics . Default is 'false'.
        'galinkdata'     => array(
            'type' => 'bool',
        ),
        // HTML email content.
        'html'           => array(
            'type' => 'string',
        ),
        // Name of the message - this attribute is for reference only and isn't sent.
        'name'           => array(
            'type' => 'string',
        ),
        // The reply to email address.
        'replyemail'     => array(
            'type' => 'string',
        ),
        // Whether the email footer features a 'send to a friend' link. Default is 'false'.
        'friendlink'     => array(
            'type' => 'bool',
        ),
        // The subject of the email.
        'subject'        => array(
            'type' => 'string',
        ),
        // Plain text content.
        'text'           => array(
            'type' => 'string',
        ),
        // Whether links are obfuscated for tracking in the plain text content. Write-only attribute - boolean, but always returned as 'null'. Default is 'false'.
        'tracktextlinks' => array(
            'type' => 'bool/null',
        ),
        // Whether a message has been used in a scheduled task.
        'used'           => array(
            'type' => 'bool',
        ),
        // Creation timestamp.
        'cdate'          => array(
            'type' => 'decimal ',
        ),
        // Last modification timestamp.
        'mdate'          => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // Whether the message is a custom opt-in email. Defaults to false.
        'customoptin'    => array(
            'type' => 'bool',
        ),
        // The source editor. 1= "HTML input", 2="Classic Editor", 3="Campaign Designer", 4="Email Editor".
        'editor'         => array(
            'type' => 'int',
        ),
        // The sender's email address. The value of the attribute must match a pre-configured value in your account on the Sign-Up.to platform. Default is 'null' if no pre-configured addresses exist.
        'fromemail'      => array(
            'type' => 'string/null',
        ),
        // The sender's display name.
        'fromname'       => array(
            'type' => 'string',
        ),
        // Enable 'utm_' data for tracked links in Google Analytics . Default is 'false'.
        'galinkdata'     => array(
            'type' => 'bool',
        ),
        // HTML email content.
        'html'           => array(
            'type' => 'string',
        ),
        // Name of the message - this attribute is for reference only and isn't sent.
        'name'           => array(
            'type' => 'string',
        ),
        // The reply to email address.
        'replyemail'     => array(
            'type' => 'string',
        ),
        // Whether the email footer features a 'send to a friend' link. Default is 'false'.
        'friendlink'     => array(
            'type' => 'bool',
        ),
        // The subject of the email.
        'subject'        => array(
            'type' => 'string',
        ),
        // Plain text content.
        'text'           => array(
            'type' => 'string',
        ),
        // Whether links are obfuscated for tracking in the plain text content. Write-only attribute - boolean, but always returned as 'null'. Default is 'false'.
        'tracktextlinks' => array(
            'type' => 'bool/null',
        ),
    );

    protected $_attributesPUT = array(
        // Whether the message is a custom opt-in email. Defaults to false.
        'customoptin'    => array(
            'type' => 'bool',
        ),
        // The sender's email address. The value of the attribute must match a pre-configured value in your account on the Sign-Up.to platform. Default is 'null' if no pre-configured addresses exist.
        'fromemail'      => array(
            'type' => 'string/null',
        ),
        // The sender's display name.
        'fromname'       => array(
            'type' => 'string',
        ),
        // Enable 'utm_' data for tracked links in Google Analytics . Default is 'false'.
        'galinkdata'     => array(
            'type' => 'bool',
        ),
        // HTML email content.
        'html'           => array(
            'type' => 'string',
        ),
        // Name of the message - this attribute is for reference only and isn't sent.
        'name'           => array(
            'type' => 'string',
        ),
        // The reply to email address.
        'replyemail'     => array(
            'type' => 'string',
        ),
        // Whether the email footer features a 'send to a friend' link. Default is 'false'.
        'friendlink'     => array(
            'type' => 'bool',
        ),
        // The subject of the email.
        'subject'        => array(
            'type' => 'string',
        ),
        // Plain text content.
        'text'           => array(
            'type' => 'string',
        ),
        // Whether links are obfuscated for tracking in the plain text content. Write-only attribute - boolean, but always returned as 'null'. Default is 'false'.
        'tracktextlinks' => array(
            'type' => 'bool/null',
        ),
    );
}
