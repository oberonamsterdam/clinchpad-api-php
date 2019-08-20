<?php

namespace ClinchPad\Resource;

use ClinchPad\exception\ClinchPadAPIException;

/**
 * Client Stages library.
 *
 * @package Client
 * @see https://clinchpad.com/api/docs/stages
 */
class ClinchPadStages extends Resource
{
    /**
     * Gets information about all stages in a pipeline.
     *
     * @param string $pipeline_id
     *   The ID of the pipeline.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getStages($pipeline_id, $parameters = [])
    {
        $tokens = [
            'pipeline_id' => $pipeline_id,
        ];

        return $this->client->request('GET', '/pipelines/{pipeline_id}/stages', $tokens, $parameters);
    }

    /**
     * Gets a Client stage.
     *
     * @param string $pipeline_id
     *   The ID of the pipeline.
     * @param string $stage_id
     *   The ID of the stage.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getStage($pipeline_id, $stage_id, $parameters = [])
    {
        $tokens = [
            'pipeline_id' => $pipeline_id,
            'stage_id' => $stage_id,
        ];

        return $this->client->request('GET', '/pipelines/{pipeline_id}/stages/{stage_id}', $tokens, $parameters);
    }

    /**
     * Updates a Client stage.
     *
     * @param string $pipeline_id
     *   The ID of the pipeline.
     * @param string $stage_id
     *   The ID of the stage.
     * @param string $name
     *   The stage's name.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function updateStage($pipeline_id, $stage_id, $name, $parameters = [])
    {
        $tokens = [
            'pipeline_id' => $pipeline_id,
            'stage_id' => $stage_id,
        ];

        $parameters += [
            'name' => $name
        ];

        return $this->client->request('PUT', '/pipelines/{pipeline_id}/stages/{stage_id}', $tokens, $parameters);
    }

}
