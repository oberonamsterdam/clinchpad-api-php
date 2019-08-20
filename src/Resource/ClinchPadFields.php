<?php

namespace ClinchPad\Resource;

use ClinchPad\exception\ClinchPadAPIException;

/**
 * Client Fields library.
 *
 * @package Client
 * @see https://clinchpad.com/api/docs/fields
 */
class ClinchPadFields extends Resource
{


    /**
     * Gets information about all fields owned by the authenticated account.
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
    public function getFields($lead_id, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
        ];

        return $this->client->request('GET', '/leads/{lead_id}/fields', $tokens, $parameters);
    }

    /**
     * Gets a Client field.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param string $field_id
     *   The ID of the field.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getField($lead_id, $field_id, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
            'field_id' => $field_id,
        ];

        return $this->client->request('GET', '/leads/{lead_id}/fields/{field_id}', $tokens, $parameters);
    }

    /**
     * Creates a new Client field.
     *
     * @param string $lead_id
     *   The lead ID for the field.
     * @param string $name
     *   The field's name.
     * @param string $value
     *   The field's value.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function createField($lead_id, $name, $value, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
        ];

        $parameters += [
            'name' => $name,
            'value' => $value,
        ];

        return $this->client->request('POST', '/leads/{lead_id}/fields', $tokens, $parameters);
    }

    /**
     * Updates a Client field.
     *
     * @param string $lead_id
     *   The lead ID for the field.
     * @param string $field_id
     *   The ID of the field.
     * @param string $value
     *   The field's value.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function updateField($lead_id, $field_id, $value, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
            'field_id' => $field_id,
        ];

        $parameters += [
            'value' => $value,
        ];

        return $this->client->request('PUT', '/leads/{lead_id}/fields/{field_id}', $tokens, $parameters);
    }

    /**
     * Deletes a Client field.
     *
     * @param string $lead_id
     *   The lead ID for the field.
     * @param string $field_id
     *   The ID of the field.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function deleteField($lead_id, $field_id)
    {
        $tokens = [
            'lead_id' => $lead_id,
            'field_id' => $field_id,
        ];

        return $this->client->request('DELETE', '/leads/{lead_id}/fields/{field_id}', $tokens);
    }


}
