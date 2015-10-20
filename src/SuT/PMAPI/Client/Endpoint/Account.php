<?php
namespace SuT\PMAPI\Client\Endpoint;

class Account extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Account';
    protected $_allowPUT = false;
    protected $_allowPOST = true;


    protected $_attributesGET = array(
        // Unique ID of the company account.
        'id'                           => array(
            'type' => 'int',
        ),
        // The postal address for the company.
        'address'                      => array(
            'type' => 'string',
        ),
        // The maximum number of automations that the account is allowed. Defaults to null (unlimited).
        'automation_limit'             => array(
            'type' => 'int/null',
        ),
        // The contact email address for the account.
        'contactemail'                 => array(
            'type' => 'string',
        ),
        // Company's country in ISO-3316-1 format (two character), for example "GB".
        'country'                      => array(
            'type' => 'string',
        ),
        // The email credit balance for the account.
        'emailcreditbalance'           => array(
            'type' => 'int',
        ),
        // Total number of folders in the account.
        'folder_count'                 => array(
            'type' => 'int',
        ),
        // Whether the account has folder restrictions enabled for sub-users (deprecated).
        'folderrestrict'               => array(
            'type' => 'bool',
        ),
        // This is the mail tracking domain which acts as the goal tracking domain.
        'goaltrackingdomain'           => array(
            'type' => 'string',
        ),
        // The inbox test credit balance for the account.
        'inboxtestcreditbalance'       => array(
            'type' => 'int',
        ),
        // Total number of lists in the account.
        'list_count'                   => array(
            'type' => 'int',
        ),
        // The maximum number of lists that the account is allowed. Defaults to 200.
        'list_limit'                   => array(
            'type' => 'int',
        ),
        // Name of the company account.
        'name'                         => array(
            'type' => 'string',
        ),
        // The maximum number of searches that the account is allowed. Defaults to null (unlimited).
        'search_limit'                 => array(
            'type' => 'int/null',
        ),
        // The maximum number of SMS automations that the account is allowed. Defaults to null (unlimited).
        'smsautomation_limit'          => array(
            'type' => 'int/null',
        ),
        // The SMS credit balance for the account.
        'smscreditbalance'             => array(
            'type' => 'int',
        ),
        // Total number of email/sms subscribers in the account.
        'subscriber_count'             => array(
            'type' => 'int/null',
        ),
        // The maximum number of subscribers that the account is allowed. Defaults to null (unlimited). The minimum value is 1.
        'subscriber_limit'             => array(
            'type' => 'int/null',
        ),
        // The maximum number of subscriber profile fields that the account is allowed. Defaults to null (unlimited).
        'subscriberprofilefield_limit' => array(
            'type' => 'int/null',
        ),
        // The telephone number for the company, including country dialling code.
        'telephone'                    => array(
            'type' => 'string/null',
        ),
        // The Company's timezone in TZ (e.g. 'Europe/London') format. If not set, defaults to the Partner timezone.
        'timezone'                     => array(
            'type' => 'string',
        ),
        // Total number of sub-users that the account currently has setup.
        'user_count'                   => array(
            'type' => 'int',
        ),
        // Total number of sub-users that the account can setup. Defaults to zero.
        'user_limit'                   => array(
            'type' => 'int',
        ),
        // The company website URL. Must be full URL starting with 'http'. Defaults to null.
        'website'                      => array(
            'type' => 'string/null',
        ),
        // Creation timestamp.
        'cdate'                        => array(
            'type' => 'decimal',
        ),
        // Last modification timestamp
        'mdate'                        => array(
            'type' => 'decimal ',
        ),
    );
}
