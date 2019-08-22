<?php

namespace ClinchPad\Resource;

use ClinchPad\Exception\ClinchPadAPIException;

/**
 * ClinchPadOrganizations library.
 *
 * @package ClinchPad
 * @see https://clinchpad.com/api/docs/organizations
 */
class ClinchPadOrganizations extends Resource
{

    /**
     * Gets information about all organizations owned by the authenticated account.
     *
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getOrganizations($parameters = [])
    {
        return $this->client->request('GET', '/organizations', [], $parameters);
    }

    /**
     * Gets a ClinchPad organization.
     *
     * @param string $organization_id
     *   The ID of the organization.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getOrganization($organization_id, $parameters = [])
    {
        $tokens = [
            'organization_id' => $organization_id,
        ];

        return $this->client->request('GET', '/organizations/{organization_id}', $tokens, $parameters);
    }

    /**
     * Creates a new ClinchPad organization.
     *
     * @param string $name
     *   The organization's name.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function createOrganization($name, $parameters = [])
    {
        $parameters += [
            'name' => $name,
        ];

        return $this->client->request('POST', '/organizations', NULL, $parameters);
    }

    /**
     * Updates a ClinchPad organization.
     *
     * @param string $organization_id
     *   The ID of the organization.
     * @param string $name
     *   The organization's name.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function updateOrganization($organization_id, $parameters = [])
    {
        $tokens = [
            'organization_id' => $organization_id
        ];

        return $this->client->request('PUT', '/organizations/{organization_id}', $tokens, $parameters);
    }

    /**
     * Updates the value of a ClinchPad organization's custom field.
     *
     * @param string $organization_id
     *   The ID of the organization.
     * @param string $field_id
     *   The ID of the custom field.
     * @param string $value
     *   The fields's value.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function updateOrganizationField($organization_id, $field_id, $value, $parameters = [])
    {
        $tokens = [
            'organization_id' => $organization_id,
            'field_id' => $field_id,
        ];

        $parameters += [
            'value' => $value
        ];

        return $this->client->request('PUT', '/organizations/{organization_id}/fields/{field_id}', $tokens, $parameters);
    }

    /**
     * Deletes a ClinchPad organization.
     *
     * @param string $organization_id
     *   The ID of the lead.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function deleteOrganization($organization_id)
    {
        $tokens = [
            'organization_id' => $organization_id
        ];

        return $this->client->request('DELETE', '/organizations/{organization_id}', $tokens);
    }

}
