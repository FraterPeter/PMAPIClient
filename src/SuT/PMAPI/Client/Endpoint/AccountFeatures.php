<?php
namespace SuT\PMAPI\Client\Endpoint;

class AccountFeatures extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'AccountFeatures';
    protected $_allowPUT = false;
    protected $_allowPOST = true;


    protected $_attributesGET = array(
        // Unique ID of the company account.
        'id'                            => array(
            'type' => 'int',
        ),
        // The maximum number of automations that the account is allowed. Defaults to null (unlimited).
        'automation_limit'              => array(
            'type' => 'int/null',
        ),
        // The contact email address for the account.
        'contactemail'                  => array(
            'type' => 'string',
        ),
        // If the account is using a custom sending email address or domain, the type of domain i.e. 'fixed_email' or 'domain'. Will be null if 'enablecustommaildomain' is false. Defaults to 'fixed_email' otherwise.
        'custommaildomaintype'          => array(
            'type' => 'string/null',
        ),
        // Whether the account has Analysis tools enabled. Defaults to false.
        'enableanalyse'                 => array(
            'type' => 'bool',
        ),
        // Whether the account can use the Audience Insights feature. Defaults to true .
        'enableaudienceinsights'        => array(
            'type' => 'bool',
        ),
        // Whether the account users can change their passwords. Defaults to true.
        'enablechangepassword'          => array(
            'type' => 'bool',
        ),
        // Whether the account uses a custom sending email address / domain. Defaults to false.
        'enablecustommaildomain'        => array(
            'type' => 'bool',
        ),
        // Whether the account has DomainKeys Identified Mail (DKIM) enabled. Defaults to true.
        'enabledkim'                    => array(
            'type' => 'bool',
        ),
        // Whether the account has Dynamic Content enabled. Defaults to false.
        'enabledynamiccontent'          => array(
            'type' => 'bool',
        ),
        // Whether the account has email feature set. Defaults to true.
        'enableemail'                   => array(
            'type' => 'bool',
        ),
        // Whether the account uses email credits. Defaults to true.
        'enableemailcredits'            => array(
            'type' => 'bool',
        ),
        // Whether the account can integrate with Facebook. Defaults to false.
        'enablefacebook'                => array(
            'type' => 'bool',
        ),
        // Whether the account has PMAPI access enabled over HTTP. Defaults to true.
        'enablehttppmapi'               => array(
            'type' => 'bool',
        ),
        // Whether the account can run inbox tests. Defaults to false.
        'enableinboxtest'               => array(
            'type' => 'bool',
        ),
        // Whether the account has Salesforce integration enabled. Defaults to true.
        'enablesalesforce'              => array(
            'type' => 'bool',
        ),
        // Whether the account can send bulk email campaigns. Defaults to true.
        'enablesendbulkemail'           => array(
            'type' => 'bool',
        ),
        // Whether the account can send bulk SMS campaigns. Defaults to true.
        'enablesendbulksms'             => array(
            'type' => 'bool',
        ),
        // Whether the account has SMS feature set. Defaults to true.
        'enablesms'                     => array(
            'type' => 'bool',
        ),
        // Whether the account can run split tests. Will only be non-null if 'enablesendbulkemail' is true. Defaults to false.
        'enablesplittest'               => array(
            'type' => 'bool/null',
        ),
        // Whether the account has Subscriber Profile Fields enabled. Defaults to true.
        'enablesubscriberprofilefields' => array(
            'type' => 'bool',
        ),
        // Whether the account can accept subscriptions via inbound SMS (MO). Will only be non-null if 'enablesms' is true. Defaults to true.
        'enablesubscriptionmo'          => array(
            'type' => 'bool/null',
        ),
        // Whether Timezone Premium features are enabled for the account. Defaults to false.
        'enabletimezonepremium'         => array(
            'type' => 'bool',
        ),
        // Whether the account can integrate with Twitter. Defaults to false.
        'enabletwitter'                 => array(
            'type' => 'bool',
        ),
        // Whether the account can integrate with Wordpress. Defaults to false.
        'enablewordpress'               => array(
            'type' => 'bool',
        ),
        // The maximum number of lists that the account is allowed. Defaults to 200.
        'list_limit'                    => array(
            'type' => 'int',
        ),
        // Whether the account is locked (users cannot access the account or make PM API calls).
        'locked'                        => array(
            'type' => 'bool',
        ),
        // The primary custom sending email address or domain. Will be null if 'enablecustommaildomain' is false.
        'maildomainprimary'             => array(
            'type' => 'string/null',
        ),
        // The maximum number of searches that the account is allowed. Defaults to null (unlimited).
        'search_limit'                  => array(
            'type' => 'int/null',
        ),
        // The maximum number of SMS automations that the account is allowed. Defaults to null (unlimited).
        'smsautomation_limit'           => array(
            'type' => 'int/null',
        ),
        // The maximum number of subscribers that the account is allowed. Defaults to null (unlimited). The minimum value is 1.
        'subscriber_limit'              => array(
            'type' => 'int/null',
        ),
        // The maximum number of subscriber profile fields that the account is allowed. Can only be non-null if 'enablesubscriberprofilefields' is true. Defaults to null (unlimited).
        'subscriberprofilefield_limit'  => array(
            'type' => 'int/null',
        ),
        // The Company's timezone in TZ (e.g. 'Europe/London') format. If not set, defaults to the Partner timezone.
        'timezone'                      => array(
            'type' => 'string',
        ),
        // Total number of sub-users that the account can setup.
        'user_limit'                    => array(
            'type' => 'int',
        ),
        // Creation timestamp.
        'cdate'                         => array(
            'type' => 'decimal',
        ),
        // Last modification timestamp.
        'mdate'                         => array(
            'type' => 'decimal ',
        ),
    );
}
