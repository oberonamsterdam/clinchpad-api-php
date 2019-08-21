<?php

namespace ClinchPad\Resource;

use ClinchPad\Exception\ClinchPadAPIException;

/**
 * ClinchPadNotes library.
 *
 * @package ClinchPad
 * @see https://clinchpad.com/api/docs/notes
 */
class ClinchPadNotes extends Resource
{

    /**
     * Gets ClinchPadnotes for a lead.
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
    public function getNotesForLead($lead_id, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
        ];

        return $this->client->request('GET', '/leads/{lead_id}/notes', $tokens, $parameters);
    }

    /**
     * Creates a ClinchPad note for a lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param string $user_id
     *   The ID of the user.
     * @param string $content
     *   The quantity of the note.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function createNote($lead_id, $user_id, $content, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
        ];

        $parameters += [
            'user_id' => $user_id,
            'content' => $content,
        ];

        return $this->client->request('POST', '/leads/{lead_id}/notes', $tokens, $parameters);
    }

    /**
     * Creates a ClinchPad note for a lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param string $note_id
     *   The ID of the note.
     * @param string $content
     *   The quantity of the note.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function updateNote($lead_id, $note_id, $content, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
            'note_id' => $note_id,
        ];

        $parameters += [
            'content' => $content,
        ];

        return $this->client->request('PUT', '/leads/{lead_id}/notes/{note_id}', $tokens, $parameters);
    }

    /**
     * Deletes a ClinchPad note.
     *
     * @param string $lead_id
     *   The ID of the lead.s
     * @param string $note_id
     *   The ID of the note.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function deleteNote($lead_id, $note_id)
    {
        $tokens = [
            'lead_id' => $lead_id,
            'note_id' => $note_id,
        ];

        return $this->client->request('DELETE', '/leads/{lead_id}/notes/{note_id}', $tokens);
    }

}
