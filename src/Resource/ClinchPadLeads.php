<?php

namespace ClinchPad\Resource;

use ClinchPad\exception\ClinchPadAPIException;

/**
 * Client Leads library.
 *
 * @package Client
 * @see https://clinchpad.com/api/docs/leads
 */
class ClinchPadLeads extends Resource
{

    /**
     * Gets information about all leads owned by the authenticated account.
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
    public function getLeads($pipeline_id, $parameters = [])
    {
        $parameters += [
            'pipeline_id' => $pipeline_id,
        ];

        return $this->client->request('GET', '/leads', NULL, $parameters);
    }

    /**
     * Gets a Client lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getLead($lead_id, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
        ];

        return $this->client->request('GET', '/leads/{lead_id}', $tokens, $parameters);
    }

    /**
     * Creates a new Client lead.
     *
     * @param string $name
     *   The lead's name.
     * @param string $pipeline_id
     *   The pipeline ID for the lead.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function createLead($name, $pipeline_id, $parameters = [])
    {
        $parameters += [
            'name' => $name,
            'pipeline_id' => $pipeline_id,
        ];

        return $this->client->request('POST', '/leads', NULL, $parameters);
    }

    /**
     * Updates a Client lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function updateLead($lead_id, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id
        ];

        return $this->client->request('PUT', '/leads/{lead_id}', $tokens, $parameters);
    }

    /**
     * Deletes a Client lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function deleteLead($lead_id)
    {
        $tokens = [
            'lead_id' => $lead_id
        ];

        return $this->client->request('DELETE', '/leads/{lead_id}', $tokens);
    }


}
