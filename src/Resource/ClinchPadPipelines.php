<?php

namespace ClinchPad\Resource;

use ClinchPad\exception\ClinchPadAPIException;

/**
 * Client Pipelines library.
 *
 * @package Client
 * @see https://clinchpad.com/api/docs/pipelines
 */
class ClinchPadPipelines extends Resource
{
    /**
     * Gets information about all pipelines owned by the authenticated account.
     *
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getPipelines($parameters = [])
    {
        return $this->client->request('GET', '/pipelines', NULL, $parameters);
    }

    /**
     * Gets a Client pipeline.
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
    public function getPipeline($pipeline_id, $parameters = [])
    {
        $tokens = [
            'pipeline_id' => $pipeline_id,
        ];

        return $this->client->request('GET', '/pipelines/{pipeline_id}', $tokens, $parameters);
    }

    /**
     * Creates a new Client pipeline.
     *
     * @param string $name
     *   The pipeline's name.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function createPipeline($name, $parameters = [])
    {
        $parameters += [
            'name' => $name,
        ];

        return $this->client->request('POST', '/pipelines', NULL, $parameters);
    }

    /**
     * Updates a Client pipeline.
     *
     * @param string $pipeline_id
     *   The ID of the pipeline.
     * @param string $name
     *   The pipeline's name.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function updatePipeline($pipeline_id, $name, $parameters = [])
    {
        $tokens = [
            'pipeline_id' => $pipeline_id
        ];

        $parameters += [
            'name' => $name
        ];

        return $this->client->request('PUT', '/pipelines/{pipeline_id}', $tokens, $parameters);
    }

    /**
     * Deletes a Client pipeline.
     *
     * @param string $pipeline_id
     *   The ID of the lead.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function deletePipeline($pipeline_id)
    {
        $tokens = [
            'pipeline_id' => $pipeline_id
        ];

        return $this->client->request('DELETE', '/pipelines/{pipeline_id}', $tokens);
    }

}
