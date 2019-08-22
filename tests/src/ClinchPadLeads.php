<?php

namespace ClinchPad\Tests;

/**
 * ClinchPadLists library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadLeads extends \ClinchPad\Resource\ClinchPadLeads
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
    public function getLeads($pipeline_id, $parameters = [])
    {
        parent::getLeads($pipeline_id, $parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26eccce8b4310e00006b',
                    'name' => 'Default',
                ],
                (object)[
                    '_id' => '52219a33cce8b46dd400006a',
                    'name' => 'Lead 1',
                ],
                (object)[
                    '_id' => '52219adccce8b4a68d000070',
                    'name' => 'Lead 2',
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getLead($lead_id, $parameters = [])
    {
        parent::getLead($lead_id, $parameters);

        $response = (object)[
            '_id' => $lead_id,
            'name' => 'Test Lead',
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function createLead($name, $pipeline_id, $parameters = [])
    {
        parent::createLead($name, $pipeline_id, $parameters);

        $response = (object)[
            '_id' => '52219adccce8b4a68d000070',
            'name' => $name,
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function updateLead($lead_id, $parameters = [])
    {
        parent::updateLead($lead_id, $parameters);

        $response = (object)[
            '_id' => $lead_id,
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function deleteLead($lead_id)
    {
        parent::deleteLead($lead_id);

        $response = (object)[];

        return $response;
    }

}
