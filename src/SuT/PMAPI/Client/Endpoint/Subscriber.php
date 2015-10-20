<?php
namespace SuT\PMAPI\Client\Endpoint;

class Subscriber extends AbstractSimpleEndpoint
{
    protected $_endpointName = 'Subscriber';

    protected $_attributesGET = array(
        // Unique ID of the subscriber.
        'id' => array(
            'type' => 'int',
        ),
        // Whether this subscriber has ever had a bounced email.
        'bounce_exists' => array(
            'type' => 'bool',
        ),
        // Subscriber's company name.
        'companyname' => array(
            'type' => 'string/null',
        ),
        // Whether the subscription to the list specified by list_id is confirmed.
        'confirmed' => array(
            'type' => 'bool/null',
        ),
        // Whether this subscriber has ever been contacted.
        'contact_exists' => array(
            'type' => 'bool',
        ),
        // Subscriber's country in ISO-3316-1 format (two character), for example "GB".
        'country' => array(
            'type' => 'string/null',
        ),
        // Subscriber's county.
        'county' => array(
            'type' => 'string/null',
        ),
        // The day of the month of the subscriber's birthday (1-31).
        'daybirth' => array(
            'type' => 'int/null',
        ),
        // Subscriber email address.
        'email' => array(
            'type' => 'string',
        ),
        // MD5 digest of the contents of the "email" attribute.
        'emailmd5' => array(
            'type' => 'string',
        ),
        // Whether email delivery to the subscriber is currently suspended.
        'emailsuspended' => array(
            'type' => 'bool',
        ),
        // Subscriber's first/given name.
        'firstname' => array(
            'type' => 'string/null',
        ),
        // Either "male" or "female".
        'gender' => array(
            'type' => 'enum/null',
        ),
        // Subscriber's house number.
        'housenumber' => array(
            'type' => 'string/null',
        ),
        // Subscriber's last/family name.
        'lastname' => array(
            'type' => 'string/null',
        ),
        // IP address from which the subscriber most recently opened an email.
        'latestopenip' => array(
            'type' => 'string/null',
        ),
        // List ID(s) of the list that the subscriber is subscribed to.
        'list_id' => array(
            'type' => 'int/null/array',
        ),
        // The month of the subscriber's birthday (1-12).
        'monthbirth' => array(
            'type' => 'int/null',
        ),
        // Subscriber MSISDN (see definition). N.B. This attribute is treated as a string.
        'msisdn' => array(
            'type' => 'string',
        ),
        // Subscriber's postcode.
        'postcode' => array(
            'type' => 'string/null',
        ),
        // Whether SMS delivery to the subscriber is currently suspended.
        'smssuspended' => array(
            'type' => 'bool',
        ),
        // Subscriber's street name.
        'streetname' => array(
            'type' => 'string/null',
        ),
        // Number of subscriptions held by this subscriber.
        'subscription_count' => array(
            'type' => 'int/null',
        ),
        // Subscriber's title.
        'title' => array(
            'type' => 'string/null',
        ),
        // Subscriber's town.
        'town' => array(
            'type' => 'string/null',
        ),
        // The four-digit year of the subscriber's birth.
        'yearbirth' => array(
            'type' => 'int/null',
        ),
        // Creation timestamp.
        'cdate' => array(
            'type' => 'decimal ',
        ),
        // Last modification timestamp.
        'mdate' => array(
            'type' => 'decimal ',
        ),
    );

    protected $_attributesPOST = array(
        // Subscriber's company name.
        'companyname' => array(
            'type' => 'string/null',
        ),
        // Whether the subscription to the list specified by list_id is confirmed.
        'confirmed' => array(
            'type' => 'bool/null',
        ),
        // Subscriber's country in ISO-3316-1 format (two character), for example "GB".
        'country' => array(
            'type' => 'string/null',
        ),
        // Subscriber's county.
        'county' => array(
            'type' => 'string/null',
        ),
        // The day of the month of the subscriber's birthday (1-31).
        'daybirth' => array(
            'type' => 'int/null',
        ),
        // Subscriber email address.
        'email' => array(
            'type' => 'string',
        ),
        // Subscriber's first/given name.
        'firstname' => array(
            'type' => 'string/null',
        ),
        // Either "male" or "female".
        'gender' => array(
            'type' => 'enum/null',
        ),
        // Subscriber's house number.
        'housenumber' => array(
            'type' => 'string/null',
        ),
        // Subscriber's last/family name.
        'lastname' => array(
            'type' => 'string/null',
        ),
        // List ID(s) of the list that the subscriber is subscribed to.
        'list_id' => array(
            'type' => 'int/null/array',
        ),
        // The month of the subscriber's birthday (1-12).
        'monthbirth' => array(
            'type' => 'int/null',
        ),
        // Subscriber MSISDN (see definition). N.B. This attribute is treated as a string.
        'msisdn' => array(
            'type' => 'string',
        ),
        // Subscriber's postcode.
        'postcode' => array(
            'type' => 'string/null',
        ),
        // Subscriber's street name.
        'streetname' => array(
            'type' => 'string/null',
        ),
        // Subscriber's title.
        'title' => array(
            'type' => 'string/null',
        ),
        // Subscriber's town.
        'town' => array(
            'type' => 'string/null',
        ),
        // The four-digit year of the subscriber's birth.
        'yearbirth' => array(
            'type' => 'int/null',
        ),
    );

    protected $_attributesPUT = array(
        // Subscriber's company name.
        'companyname' => array(
            'type' => 'string/null',
        ),
        // Subscriber's country in ISO-3316-1 format (two character), for example "GB".
        'country' => array(
            'type' => 'string/null',
        ),
        // Subscriber's county.
        'county' => array(
            'type' => 'string/null',
        ),
        // The day of the month of the subscriber's birthday (1-31).
        'daybirth' => array(
            'type' => 'int/null',
        ),
        // Subscriber email address.
        'email' => array(
            'type' => 'string',
        ),
        // Whether email delivery to the subscriber is currently suspended.
        'emailsuspended' => array(
            'type' => 'bool',
        ),
        // Subscriber's first/given name.
        'firstname' => array(
            'type' => 'string/null',
        ),
        // Either "male" or "female".
        'gender' => array(
            'type' => 'enum/null',
        ),
        // Subscriber's house number.
        'housenumber' => array(
            'type' => 'string/null',
        ),
        // Subscriber's last/family name.
        'lastname' => array(
            'type' => 'string/null',
        ),
        // The month of the subscriber's birthday (1-12).
        'monthbirth' => array(
            'type' => 'int/null',
        ),
        // Subscriber MSISDN (see definition). N.B. This attribute is treated as a string.
        'msisdn' => array(
            'type' => 'string',
        ),
        // Subscriber's postcode.
        'postcode' => array(
            'type' => 'string/null',
        ),
        // Whether SMS delivery to the subscriber is currently suspended.
        'smssuspended' => array(
            'type' => 'bool',
        ),
        // Subscriber's street name.
        'streetname' => array(
            'type' => 'string/null',
        ),
        // Subscriber's title.
        'title' => array(
            'type' => 'string/null',
        ),
        // Subscriber's town.
        'town' => array(
            'type' => 'string/null',
        ),
        // The four-digit year of the subscriber's birth.
        'yearbirth' => array(
            'type' => 'int/null',
        ),
    );
}
