<?php

namespace ClinchPad\Tests;

use ClinchPad\exception\ClinchPadAPIException;
use PHPUnit\Framework\TestCase;

/**
 * ClinchPadNotes test library.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadNotesTest extends TestCase
{

    /**
     * Tests library functionality for note information.
     * @throws ClinchPadAPIException
     */
    public function testGetNotesForLead()
    {
        $lead_id = '52219adccce8b4a68d000070';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadNotes($client);
        $resource->getNotesForLead($lead_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id . '/notes', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for adding a note to a lead.
     * @throws ClinchPadAPIException
     */
    public function testCreateNote()
    {
        $lead_id = '531ed3a49a21f6e90b00000e';
        $user_id = '521f26ebcce8b4310e000064';
        $content = 'new note ...';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadNotes($client);
        $resource->createNote($lead_id, $user_id, $content);

        $this->assertEquals('POST', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id . '/notes', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for removing a note from a lead.
     * @throws ClinchPadAPIException
     */
    public function testRemoveNoteFromLead()
    {
        $lead_id = '531ed3a49a21f6e90b00000e';
        $note_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadNotes($client);
        $resource->deleteNote($lead_id, $note_id);

        $this->assertEquals('DELETE', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id . '/notes/' . $note_id, $client->getClient()->uri);
    }

}
