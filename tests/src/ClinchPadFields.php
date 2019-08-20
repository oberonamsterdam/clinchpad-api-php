<?php

namespace ClinchPad\Tests;

/**
 * ClinchPadClient Lists library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadFields extends \ClinchPad\Resource\ClinchPadFields
{

    /**
     * @inheritdoc
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @inheritdoc
     */
    public function getFields($lead_id, $parameters = [])
    {
        parent::getFields($lead_id, $parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26eccce8b4310e00006b',
                    'name' => 'Newsletter',
                    'value' => 'subscribed'
                ],
                (object)[
                    '_id' => '527cc0cbcce8b40d3100000d',
                    'name' => 'LinkedIn',
                    'value' => NULL
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getField($lead_id, $field_id, $parameters = [])
    {
        parent::getField($lead_id, $field_id, $parameters);

        $response = (object)[
            '_id' => $field_id,
            'name' => 'Newsletter',
            'value' => 'subscribed'
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function createField($lead_id, $name, $value, $parameters = [])
    {
        parent::createField($lead_id, $name, $value, $parameters);

        $response = (object)[
            '_id' => '521f26eccce8b4310e00006b',
            'name' => $name,
            'value' => 'subscribed'
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function updateField($lead_id, $field_id, $value, $parameters = [])
    {
        parent::updateField($lead_id, $field_id, $value, $parameters);

        $response = (object)[
            '_id' => $field_id,
            'name' => 'Newsletter',
            'value' => $value,
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function deleteField($lead_id, $field_id)
    {
        parent::deleteField($lead_id, $field_id);

        $response = (object)[];

        return $response;
    }

}
