<?php

namespace SuT\PMAPI\Client\Endpoint;

class HelperException extends \Exception
{
}

class InvalidArgumentHelperException extends HelperException
{
    public function __construct($field, $value)
    {
        parent::__construct("Value '$value' is invalid for argument '$field'", 0, null);
    }
}

class HelperRequestException extends HelperException
{
}

class InvalidPropertyHelperException extends HelperException
{
}

class InvalidPropertyValueHelperException extends HelperException
{
    public function __construct($field, $value)
    {
        parent::__construct("Value '$value' is invalid for property '$field'", 0, null);
    }
}

class InvalidConfigurationHelperException extends HelperException
{
}

class InvalidDeleteRecordNotSavedHelperException extends HelperException
{
}

class InvalidPUTPropertyHelperException extends InvalidPropertyHelperException
{
}

class InvalidPOSTPropertyHelperException extends InvalidPropertyHelperException
{
}

class InvalidGETPropertyHelperException extends InvalidPropertyHelperException
{
}

class ModificationDeniedPropertyHelperException extends InvalidPropertyHelperException
{
}

class RecordDoesNotExistHelperException extends HelperRequestException
{
}

class EmailMessageException extends HelperException
{
}

class SubscriberException extends HelperException
{
}

class SubscriberInvalidParameterException extends SubscriberException
{
    public function __construct($field)
    {
        parent::__construct("Parameter '$field' is invalid.", 0, null);
    }
}

class SubscriberEmailOptInException extends SubscriberException
{
}

class SubscriberUnableToSaveSubscriberException extends SubscriberException
{
}

class SubscriberUnableToSaveSubscriberProfileDataException extends SubscriberException
{
}

class SubscriberUnsupportedFieldException extends SubscriberException
{
}

class SubscriberRecordDoesNotExistException extends RecordDoesNotExistHelperException
{
}

class SubscriberRequestException extends SubscriberException
{
}

class SubscriberSubscriptionException extends SubscriberException
{
}

class SubscriberUnableToDeleteListException extends SubscriberException
{
}

class SubscriberNotSavedException extends SubscriberException
{
}

class SubscriberUnableToDeleteSubscriberException extends SubscriberException
{
}
