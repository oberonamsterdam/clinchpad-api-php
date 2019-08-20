<?php

namespace ClinchPad\Tests;

/**
 * ClinchPadClient Lists library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadStages extends \ClinchPad\Resource\ClinchPadStages
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
    public function getStages($pipeline_id, $parameters = [])
    {
        parent::getStages($pipeline_id, $parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26eccce8b4310e00006c',
                    'name' => 'Closing',
                ],
                (object)[
                    '_id' => '521f26eccce8b4310e00006d',
                    'name' => 'In Negotiation',
                ],
                (object)[
                    '_id' => '521f26eccce8b4310e00006e',
                    'name' => 'Offer',
                ],
                (object)[
                    '_id' => '521f26eccce8b4310e00006f',
                    'name' => 'Contact',
                ],
                (object)[
                    '_id' => '521f26eccce8b4310e000070',
                    'name' => 'Prospect',
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getStage($pipeline_id, $stage_id, $parameters = [])
    {
        parent::getStage($pipeline_id, $stage_id, $parameters);

        $response = (object)[
            '_id' => $stage_id,
            'name' => 'Prospect',
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function updateStage($pipeline_id, $stage_id, $name, $parameters = [])
    {
        parent::updateStage($pipeline_id, $stage_id, $name, $parameters);

        $response = (object)[
            '_id' => $stage_id,
            'name' => $name,
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

}
