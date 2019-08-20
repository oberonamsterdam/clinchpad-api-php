<?php

namespace ClinchPad\Tests;

/**
 * ClinchPadClient Lists library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadPipelines extends \ClinchPad\Resource\ClinchPadPipelines
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
    public function getPipelines($parameters = [])
    {
        parent::getPipelines($parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26eccce8b4310e00006b',
                    'name' => 'Default',
                ],
                (object)[
                    '_id' => '52219a33cce8b46dd400006a',
                    'name' => 'Pipeline 1',
                ],
                (object)[
                    '_id' => '52219adccce8b4a68d000070',
                    'name' => 'Pipeline 2',
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getPipeline($pipeline_id, $parameters = [])
    {
        parent::getPipeline($pipeline_id, $parameters);

        $response = (object)[
            '_id' => $pipeline_id,
            'name' => 'Test Pipeline',
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function createPipeline($name, $parameters = [])
    {
        parent::createPipeline($name, $parameters);

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
    public function updatePipeline($pipeline_id, $name, $parameters = [])
    {
        parent::updatePipeline($pipeline_id, $name, $parameters);

        $response = (object)[
            '_id' => $pipeline_id,
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
    public function deletePipeline($pipeline_id)
    {
        parent::deletePipeline($pipeline_id);

        $response = (object)[];

        return $response;
    }

}
