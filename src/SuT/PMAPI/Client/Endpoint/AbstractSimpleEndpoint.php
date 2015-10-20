<?php

namespace SuT\PMAPI\Client\Endpoint;

abstract class AbstractSimpleEndpoint
{
    protected $_recordData = array();
    protected $_attributesGET = array();
    protected $_attributesPOST = array();
    protected $_attributesPUT = array();
    protected $_allowPUT = true;
    protected $_allowPOST = true;
    protected $_allowGET = true;
    protected $_modifiedAttributes = array();
    protected $_endpointName = null;

    public $request;


    public function __construct(\SuT\PMAPI\Client\Core\Request $request, $id = null)
    {
        $this->request = $request;

        if (!is_null($id) && (!is_numeric($id) || $id < 1))
        {
            throw new InvalidArgumentHelperException('$id', $id);
        }

        if ($this->_allowGET && !count($this->_attributesGET))
        {
            throw new InvalidConfigurationHelperException('GET');
        }

        if ($this->_allowPUT && !count($this->_attributesPUT))
        {
            throw new InvalidConfigurationHelperException('PUT');
        }

        if ($this->_allowPOST && !count($this->_attributesPOST))
        {
            throw new InvalidConfigurationHelperException('POST');
        }

        if ($this->_endpointName == null)
        {
            throw new InvalidConfigurationHelperException('Endpoint Name');
        }

        if ($id)
        {
            $this->setID($id);
            $this->load();
        }
    }


    protected function load()
    {
        $this->simpleLoad();
    }


    protected function simpleLoad()
    {
        $response = $this->makeGETRequest($this->_endpointName, array('id' => $this->id));
        $this->setRecordData($response->data);
    }


    public function save()
    {
        return $this->simpleSave();
    }


    public function delete()
    {
        if (!isset($this->id))
        {
            throw new InvalidDeleteRecordNotSavedHelperException();
        }

        return $this->makeDeleteRequest($this->_endpointName, array('id' => $this->id));
    }


    protected function simpleSave()
    {
        $bIsPUT     = isset($this->_recordData['id']);
        $data       = array();
        $attributes = $bIsPUT ? $this->_attributesPUT : $this->_attributesPOST;

        foreach ($attributes as $attribute => $config)
        {
            if (array_key_exists($attribute, $this->_recordData))
            {
                $data[$attribute] = $this->$attribute;
            }
        }

        if ($bIsPUT)
        {
            $data['id'] = $this->id;
            $response   = $this->makePUTRequest($this->_endpointName, $data);
            $this->setID($response->data[0]['id']);
        }
        else
        {
            $response = $this->makePOSTRequest($this->_endpointName, $data);
            $this->setID($response->data['id']);
        }

        if ($response->isError)
        {
            throw new HelperRequestException($response->error);
        }

        return $this->id;
    }


    protected function setRecordData(array $data)
    {
        $this->_recordData = $data;
    }


    public function __isset($property)
    {
        return isset($this->_recordData[$property]);
    }


    protected function setID($id)
    {
        if (!is_null($id) && (!is_numeric($id) || $id < 1))
        {
            throw new InvalidArgumentHelperException('$id', $id);
        }

        $this->_recordData['id'] = (int) $id;
    }


    public function __set($property, $value)
    {
        switch ($property)
        {
            case 'id':
                throw new ModificationDeniedPropertyHelperException($property);
        }

        $bIsPUT = isset($this->_recordData['id']);

        if ($bIsPUT && !$this->_allowPUT)
        {
            throw new ModificationDeniedPropertyHelperException($property);
        }
        else if (!$bIsPUT && !$this->_allowPOST)
        {
            throw new ModificationDeniedPropertyHelperException($property);
        }

        if ($bIsPUT && !array_key_exists($property, $this->_attributesPUT))
        {
            throw new InvalidPUTPropertyHelperException($property);
        }
        else if (!array_key_exists($property, $this->_attributesPOST))
        {
            throw new InvalidPOSTPropertyHelperException($property);
        }

        if ($bIsPUT)
        {
            $type = $this->_attributesPUT[$property]['type'];
        }
        else
        {
            $type = $this->_attributesPOST[$property]['type'];
        }

        switch ($type)
        {
            case 'bool':
            case 'boolean':
                if (!is_bool($value))
                {
                    throw new InvalidPropertyValueHelperException($property, $value);
                }
                break;
            case 'int':
                if (!(is_int($value)))
                {
                    throw new InvalidPropertyValueHelperException($property, $value);
                }
                break;
        }

        $this->_recordData[$property]         = $value;
        $this->_modifiedAttributes[$property] = $value;
    }


    public function __get($property)
    {
        if (!array_key_exists($property, $this->_attributesGET))
        {
            throw new InvalidGETPropertyHelperException($property);
        }

        if (array_key_exists($property, $this->_recordData))
        {
            if (strpos('null', $this->_attributesGET[$property]['type']))
            {
                if (is_null($this->_recordData[$property]))
                {
                    return null;
                }
            }

            switch ($this->_attributesGET[$property]['type'])
            {
                case 'bool':
                case 'boolean':
                    return (bool) $this->_recordData[$property];
                    break;
                case 'string':
                case 'enum':
                    return $this->_recordData[$property];
                    break;
                case 'int':
                case 'decimal':
                    return (int) $this->_recordData[$property];
                    break;
            }

            return $this->_recordData[$property];
        }

        return null;
    }


    /*
     * makeDELETERequest
     *
     * A wrapper for making DELETE requests.
     *
     * @param string $endpoint
     * @param array $data
     *
     * @return Response
     */
    protected function makeDELETERequest($endpoint, $data = array())
    {
        $response = $this->request->$endpoint->delete($data);

        if ($response->isError)
        {
            if ($response->error == "Not Found")
            {
                throw new RecordDoesNotExistHelperException($response->error);
            }
            else
            {
                throw new HelperRequestException($response->error);
            }
        }

        return $response;
    }


    /*
     * makeGETRequest
     *
     * A wrapper for making GET requests.
     *
     * @param string $endpoint
     * @param array $data
     *
     * @return Response
     */
    protected function makeGETRequest($endpoint, $data = array())
    {
        $response = $this->request->$endpoint->get($data);

        if ($response->isError)
        {
            if ($response->error == "Not Found")
            {
                throw new RecordDoesNotExistHelperException($response->error);
            }
            else
            {
                throw new HelperRequestException($response->error);
            }
        }

        return $response;
    }


    /*
     * makePUTRequest
     *
     * A wrapper for making PUT requests.
     *
     * @param string $endpoint
     * @param array $data
     *
     * @return Response
     */
    protected function makePUTRequest($endpoint, $data = array())
    {
        $response = $this->request->$endpoint->put($data);

        if ($response->isError)
        {
            throw new HelperRequestException($response->error);
        }

        return $response;
    }


    /*
     * makePOSTRequest
     *
     * A wrapper for making POST requests.
     *
     * @param string $endpoint
     * @param array $data
     *
     * @return Response
     */
    protected function makePOSTRequest($endpoint, $data = array())
    {
        $response = $this->request->$endpoint->post($data);

        if ($response->isError)
        {
            throw new HelperRequestException($response->error);
        }

        return $response;
    }
}