<?php

namespace ClinchPad\Resource;

use ClinchPad\Exception\ClinchPadAPIException;

/**
 * ClinchPadClient Contacts library.
 *
 * @package ClinchPad
 * @see https://clinchpad.com/api/docs/contacts
 */
class ClinchPadContacts extends Resource
{

    /**
     * Gets information about all contacts owned by the authenticated account.
     *
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getContacts($parameters = [])
    {
        return $this->client->request('GET', '/contacts', [], $parameters);
    }

    /**
     * Gets a ClinchPadClient contact.
     *
     * @param string $contact_id
     *   The ID of the contact.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getContact($contact_id, $parameters = [])
    {
        $tokens = [
            'contact_id' => $contact_id,
        ];

        return $this->client->request('GET', '/contacts/{contact_id}', $tokens, $parameters);
    }

    /**
     * Creates a new ClinchPadClient contact.
     *
     * @param string $name
     *   The contact's name.
     * @param string $email
     *   The contact's email.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function createContact($name, $email, $parameters = [])
    {
        $parameters += [
            'name' => $name,
            'email' => $email,
        ];

        return $this->client->request('POST', '/contacts', NULL, $parameters);
    }

    /**
     * Updates a ClinchPadClient contact.
     *
     * @param string $contact_id
     *   The ID of the contact.
     * @param string $name
     *   The contact's name.
     * @param string $email
     *   The contact's email.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function updateContact($contact_id, $name, $email, $parameters = [])
    {
        $tokens = [
            'contact_id' => $contact_id
        ];

        $parameters += [
            'name' => $name,
            'email' => $email,
        ];

        return $this->client->request('PUT', '/contacts/{contact_id}', $tokens, $parameters);
    }

    /**
     * Updates the value of a ClinchPadClient contact's custom field.
     *
     * @param string $contact_id
     *   The ID of the contact.
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
    public function updateContactField($contact_id, $field_id, $value, $parameters = [])
    {
        $tokens = [
            'contact_id' => $contact_id,
            'field_id' => $field_id,
        ];

        $parameters += [
            'value' => $value
        ];

        return $this->client->request('PUT', '/contacts/{contact_id}/fields/{field_id}', $tokens, $parameters);
    }

    /**
     * Deletes a ClinchPadClient contact.
     *
     * @param string $contact_id
     *   The ID of the lead.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function deleteContact($contact_id)
    {
        $tokens = [
            'contact_id' => $contact_id
        ];

        return $this->client->request('DELETE', '/contacts/{contact_id}', $tokens);
    }

    /**
     * Gets ClinchPadClient contacts for a lead.
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
    public function getContactsForLead($lead_id, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
        ];

        return $this->client->request('GET', '/leads/{lead_id}/contacts', $tokens, $parameters);
    }

    /**
     * Adds a ClinchPadClient contact to a lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param string $contact_id
     *   The ID of the contact.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function addContactToLead($lead_id, $contact_id, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
            'contact_id' => $contact_id,
        ];

        return $this->client->request('PUT', '/leads/{lead_id}/contacts/{contact_id}', $tokens, $parameters);
    }

    /**
     * Removes a ClinchPadClient contact from a lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param string $contact_id
     *   The ID of the contact.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function removeContactFromLead($lead_id, $contact_id)
    {
        $tokens = [
            'lead_id' => $lead_id,
            'contact_id' => $contact_id,
        ];

        return $this->client->request('DELETE', '/leads/{lead_id}/contacts/{contact_id}', $tokens);
    }

}
