<?php
/**
 *  Subscriber.php:
 *
 *  Please note: This class is intended for light use only and will be inefficient if used to
 *  bulk update/create subscribers.
 *
 *    Part of the Sign-Up.to Permission Marketing API v0.1 Redistributable
 *
 *
 *  Copyright (c) 2013 Sign-Up Technologies Ltd.
 *  All rights reserved.
 *
 *  Redistribution and use in source and binary forms, with or without
 *  modification, are permitted provided that the following conditions are met:
 *
 *  1. Redistributions of source code must retain the above copyright notice, this
 *     list of conditions and the following disclaimer.
 *  2. Redistributions in binary form must reproduce the above copyright notice,
 *     this list of conditions and the following disclaimer in the documentation
 *     and/or other materials provided with the distribution.
 *
 *  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 *  ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 *  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 *  DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 *  ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 *  (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 *  LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 *  ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 *  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 *  SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */

namespace SuT\PMAPI\Client\Helpers;

class Subscriber
{
    public $id;

    private $request;
    private $data = array(
        'companyname' => null,
        'confirmed'   => null,
        'country'     => null,
        'county'      => null,
        'daybirth'    => null,
        'email'       => null,
        'firstname'   => null,
        'gender'      => null,
        'housenumber' => null,
        'lastname'    => null,
        'list_id'     => null,
        'monthbirth'  => null,
        'msisdn'      => null,
        'postcode'    => null,
        'streetname'  => null,
        'title'       => null,
        'town'        => null,
        'yearbirth'   => null,
    );
    private $subscriberProfileData = array();
    private $subscriberProfileFields = array();
    private $modifiedFields = array();
    private $subscriptions = array();


    public function __construct(\SuT\PMAPI\Client\Core\Request $request, $id = null, $email = null, $msisdn = null)
    {
        $this->request = $request;

        if (!is_null($id) && (!is_numeric($id) || $id < 1))
        {
            throw new SubscriberInvalidParameterException('$id');
        }

        if (is_null($id) && !is_null($email))
        {
            $id = $this->getSubscriberIdFromEmail($email);
        }
        else if (is_null($id) && !is_null($msisdn))
        {
            $id = $this->getSubscriberIdFromMSISDN($msisdn);
        }

        if ($id)
        {
            $this->id = (int) $id;
            $this->loadSubscriber();
            $this->loadSubscriberProfileFields();
            $this->loadSubscriberProfileData();
        }
        else
        {
            $this->loadSubscriberProfileFields();
        }
    }


    /*
     * addToList
     *
     * Add a subscriber to a list
     *
     * @param int $listId
     * @param bool $confirmed whether the subscriber has opted in.
     *
     * @return boolean
     */
    public function addToList($listId, $confirmed = true)
    {
        if (!is_numeric($listId) || $listId < 1)
        {
            throw new SubscriberInvalidParameterException('$listId');
        }

        if (!is_bool($confirmed))
        {
            throw new SubscriberInvalidParameterException('$confirmed');
        }

        if (!$this->id)
        {
            throw new SubscriberNotSavedException();
        }

        if ($this->isSubscribedToList($listId))
        {
            return true;
        }

        $response = $this->request->subscription->post(array(
            'subscriber_id' => $this->id,
            'list_id'       => $listId,
            'confirmed'     => $confirmed
        ));

        if ($response->isError && $response->response['response']['resource_id'])
        {
            // The subscription already exists, return true
            return true;
        }
        else if ($response->isError)
        {
            throw new SubscriberSubscriptionException($response->error);
        }

        $this->addSubscription($response->data['id'], $response->data['list_id']);

        return true;
    }


    /*
     * sendOptInEmail
     *
     * @param int $listId
     * @param string $confirmationURL
     * 
     * @return int emailOptIn id
     */
    public function sendOptInEmail($listId, $confirmationURL=null)
    {
        if (!is_numeric($listId) || $listId < 1)
        {
            throw new SubscriberInvalidParameterException('$listId');
        }

        if (!$this->isSubscribedToList($listId))
        {
            // The subscriber has to be subscribed
            throw new SubscriberEmailOptInException ("Subscriber is not subscribed to list '$listId', can not send email optin.");
        }

        $options = array(
            'subscription_id' => $this->getListSubscriptionId($listId),
        );

        if(!is_null($confirmationURL))
        {
            $options['redirectionurl'] = $confirmationURL;
        }

        $response = $this->request->emailOptIn->post($options);

        if ($response->isError)
        {
            throw new SubscriberEmailOptInException($response->error);
        }

        return $response->data['id'];
    }


    /*
     * deleteFromList
     *
     * Delete a subscriber's subscription to a list
     *
     * @param int $listId
     *
     * @return boolean
     */
    public function deleteFromList($listId)
    {
        if (!is_numeric($listId) || $listId < 1)
        {
            throw new SubscriberInvalidParameterException('$listId');
        }

        if (!$this->id)
        {
            throw new SubscriberNotSavedException();
        }

        if (!$this->isSubscribedToList($listId))
        {
            return false;
        }

        $subscriptionId = $this->getListSubscriptionId($listId);

        $response = $this->request->subscription->delete(array(
            'id' => $subscriptionId
        ));

        if ($response->isError)
        {
            throw new SubscriberUnableToDeleteListException($response->error);
        }

        $this->removeSubscription($listId);

        return true;
    }


    /*
     * save
     *
     * Save/Update the subscriber's data and associated profile fields
     *
     * @return boolean
     */
    public function save()
    {
        if (!$this->modifiedFields)
        {
            return true;
        }

        $subscriberData        = array();
        $subscriberProfileData = array();

        foreach ($this->modifiedFields as $field => $oldvalue)
        {
            if (array_key_exists($field, $this->data))
            {
                $subscriberData[$field] = $this->$field;
            }

            if (array_key_exists($field, $this->subscriberProfileData))
            {
                $subscriberProfileData[$field] = $this->$field;
            }
        }

        // Update the subscriber record
        if ($subscriberData)
        {
            if ($this->id)
            {
                $subscriberData['id'] = $this->id;
                $method               = 'put';
            }
            else
            {
                $method = 'post';
            }

            $response = $this->request->subscriber->$method($subscriberData);

            if ($response->isError)
            {
                throw new SubscriberUnableToSaveSubscriberException($response->error);
            }

            if (!$this->id)
            {
                $this->id = $response->data['id'];
            }
        }

        // Update the subscriber profile fields
        if ($subscriberProfileData)
        {
            foreach ($subscriberProfileData as $key => $value)
            {
                if (is_null($value) || (!strlen($value)))
                {
                    // The value has a minlength, if the value is null/'' then
                    // we should delete the record.
                    $response = $this->request->subscriberProfileData->delete(array(
                        'subscriber_id'             => $this->id,
                        'subscriberprofilefield_id' => $this->subscriberProfileFields[$key]
                    ));
                }
                else
                {
                    $response = $this->request->subscriberProfileData->put(array(
                        'subscriber_id'             => $this->id,
                        'subscriberprofilefield_id' => $this->subscriberProfileFields[$key],
                        'value'                     => $value
                    ));
                }

                if ($response->isError)
                {
                    throw new SubscriberUnableToSaveSubscriberProfileDataException($response->error);
                }
            }
        }

        return true;
    }


    /*
     * delete
     *
     * Delete the subscriber
     *
     * @return boolean
     */
    public function delete()
    {
        if (!$this->id)
        {
            return false;
        }

        $response = $this->request->subscriber->delete(array(
            'id' => $this->id
        ));

        if ($response->isError)
        {
            throw new SubscriberUnableToDeleteSubscriberException($response->error);
        }

        return true;
    }


    /*
     * getSubscriptions
     *
     * Retrieve and return all subscriber subscriptions
     *
     * @return array list id => subscription id
     *
     */
    public function getSubscriptions()
    {
        if (!$this->subscriptions)
        {
            if (!$this->id)
            {
                return array();
            }

            $args     = array('subscriber_id' => $this->id);
            $response = null;

            try
            {
                do
                {
                    $response      = $this->makeGetRequest('subscription', $args);
                    $args['start'] = $response->next;


                    foreach ($response->data as $list)
                    {
                        $this->addSubscription($list['id'], $list['list_id']);
                    }
                }
                while ($response->next);
            }
            catch (SubscriberRequestException $e)
            {
                // There are no subscriptions
            }
        }

        return $this->subscriptions;
    }


    /*
     * isSubscribedToList
     *
     * Return whether the subscriber is subscribed to a given list
     *
     * @param int $listId
     *
     * @return bool
     */
    public function isSubscribedToList($listId)
    {
        if (!is_numeric($listId) || $listId < 1)
        {
            throw new SubscriberInvalidParameterException('$listId');
        }

        $this->getSubscriptions();

        return isset($this->subscriptions[$listId]);
    }


    /*
     * getListSubscriptionId
     *
     * Return a list subscription id
     *
     * @param int $listId
     *
     * @return int
    */
    public function getListSubscriptionId($listId)
    {
        if (!is_numeric($listId) || $listId < 1)
        {
            throw new SubscriberInvalidParameterException('$listId');
        }

        $this->getSubscriptions();

        if (isset($this->subscriptions[$listId]))
        {
            return $this->subscriptions[$listId];
        }
        else
        {
            return false;
        }
    }


    /*
     * getSubscriberIdFromEmail
     *
     * Retrieve the subscriber's id for a given email address
     *
     * @param string $email
     *
     * @return int subscriber id
     */
    private function getSubscriberIdFromEmail($email)
    {
        $response = $this->makeGetRequest('subscriber', array('email' => $email));
        return (int) $response->data[0]['id'];
    }


    /*
     * getSubscriberIdFromMSISDN
     *
     * Retrieve the subscriber's id for a given msisdn
     *
     * @param string $msisdn
     *
     * @return int subscriber id
     */
    private function getSubscriberIdFromMSISDN($msisdn)
    {
        $response = $this->makeGetRequest('subscriber', array('msisdn' => $msisdn));
        return (int) $response->data[0]['id'];
    }


    /*
     * loadSubscriber
     *
     * Retrieve the subscriber's data from 
     */
    private function loadSubscriber()
    {
        $response = $this->makeGetRequest('subscriber', array('id' => $this->id));

        $this->data = $response->data;
    }


    /*
     * loadSubscriberProfileFields
     *
     * Retrieve the list of possible subscriber profile fields from 
     */
    private function loadSubscriberProfileFields()
    {
        // Get all the subscriber profile fields
        $data = array('count' => 200);

        // Iterate through the all subscriber profile records, this may require more than 1 request
        // depending on how many subscriber profile fields exist.
        try
        {
            while ($data)
            {
                if ($response = $this->makeGetRequest('subscriberProfileField', $data))
                {
                    if (is_array($response->data))
                    {
                        foreach ($response->data as $item)
                        {
                            $this->subscriberProfileFields[$item['columnheader']] = $item['id'];
                            $this->subscriberProfileData[$item['columnheader']]   = null;
                        }

                        if ($response->next)
                        {
                            $data['start'] = $response->next;
                        }
                        else
                        {
                            $data = false;
                        }
                    }
                    else
                    {
                        $data = false;
                    }
                }
                else
                {
                    $data = false;
                }
            }
        }
        catch (SubscriberRequestException $e)
        {
            // There are no subscriber profile fields set up
        }
    }


    /*
     * loadSubscriberProfileData
     *
     * Retrieve the subscriber's profile data from 
     */
    private function loadSubscriberProfileData()
    {
        $args     = array('subscriber_id' => $this->id);
        $response = null;
        $spfData  = array();

        try
        {
            do
            {
                $response      = $this->makeGetRequest('subscriberProfileData', $args);
                $args['start'] = $response->next;

                foreach ($response->data as $spf)
                {
                    $spfData[$spf['subscriberprofilefield_id']] = $spf['value'];
                }

            }
            while ($response->next);

            foreach ($this->subscriberProfileFields as $columnHeader => $id)
            {
                $this->subscriberProfileData[$columnHeader] = isset($spfData[$id]) ? $spfData[$id] : null;
            }
        }
        catch (SubscriberRecordDoesNotExistException $e)
        {
            // There is no subscriber profile data
        }
    }


    /*
     * makeGetRequest
     *
     * A wrapper for making GET requests.
     *
     * @param string $endpoint
     * @param array $data
     *
     * @return Response
     */
    private function makeGetRequest($endpoint, $data = array())
    {
        $response = $this->request->$endpoint->get($data);

        if ($response->isError)
        {
            if ($response->error == "Not Found")
            {
                throw new SubscriberRecordDoesNotExistException($response->error);
            }
            else
            {
                throw new SubscriberRequestException($response->error);
            }
        }

        return $response;
    }


    /*
     * addSubscription
     *
     * @param int $subscriptionId
     * @param int $listId
     *
     */
    private function addSubscription($subscriptionId, $listId)
    {
        if (!is_numeric($subscriptionId) || $subscriptionId < 1)
        {
            throw new SubscriberInvalidParameterException('$subscriptionId');
        }

        if (!is_numeric($listId) || $listId < 1)
        {
            throw new SubscriberInvalidParameterException('$listId');
        }

        $this->subscriptions[$listId] = $subscriptionId;
    }


    /*
     * removeSubscription
     *
     * @param int $listId
     *
     */
    private function removeSubscription($listId)
    {
        unset($this->subscriptions[$listId]);
    }


    public function __get($what)
    {
        if (array_key_exists($what, $this->data))
        {
            return $this->data[$what];
        }
        else if (array_key_exists($what, $this->subscriberProfileData))
        {
            return $this->subscriberProfileData[$what];
        }
        else
        {
            throw new SubscriberUnsupportedFieldException($what);
        }
    }


    public function __isset($what)
    {
        return (array_key_exists($what, $this->data) || array_key_exists($what, $this->subscriberProfileFields));
    }


    public function __set($key, $value)
    {
        if (!isset($this->$key))
        {
            throw new SubscriberUnsupportedFieldException($key);
        }

        if (array_key_exists($key, $this->data))
        {
            if ($this->data[$key] !== $value)
            {
                $this->modifiedFields[$key] = $this->data[$key];
                $this->data[$key]           = $value;
            }
        }
        else if (array_key_exists($key, $this->subscriberProfileFields))
        {
            if ($this->subscriberProfileData[$key] != $value)
            {
                $this->modifiedFields[$key]        = $this->subscriberProfileData[$key];
                $this->subscriberProfileData[$key] = $value;
            }
        }
    }
}

class SubscriberException extends \Exception
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

class SubscriberRecordDoesNotExistException extends SubscriberRequestException
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
