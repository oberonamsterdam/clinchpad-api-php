<?php

namespace ClinchPad\Tests;

use ClinchPad\exception\ClinchPadAPIException;
use PHPUnit\Framework\TestCase;

/**
 * ClinchPadContacts test library.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadContactsTest extends TestCase
{

    /**
     * Tests library functionality for contact information.
     * @throws ClinchPadAPIException
     */
    public function testGetContacts()
    {
        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadContacts($client);
        $resource->getContacts();

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/contacts', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for contact information.
     * @throws ClinchPadAPIException
     */
    public function testGetContact()
    {
        $contact_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadContacts($client);
        $resource->getContact($contact_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/contacts/' . $contact_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for creating a contact.
     * @throws ClinchPadAPIException
     */
    public function testCreateContact()
    {
        $name = 'Test Contact';
        $email = 'test@test.com';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadContacts($client);
        $resource->createContact($name, $email);

        $this->assertEquals('POST', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/contacts', $client->getClient()->uri);

        $this->assertNotEmpty($client->getClient()->options['json']);

        $request_body = $client->getClient()->options['json'];

        $this->assertEquals($name, $request_body->name);
    }

    /**
     * Tests library functionality for updating a contact.
     * @throws ClinchPadAPIException
     */
    public function testUpdateContact()
    {
        $contact_id = '52219a33cce8b46dd400006a';
        $name = 'Test Contact Update';
        $email = 'test@test.com';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadContacts($client);
        $resource->updateContact($contact_id, $name, $email);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/contacts/' . $contact_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for updating a custom field in a contact.
     * @throws ClinchPadAPIException
     */
    public function testUpdateContactField()
    {
        $contact_id = '52219a33cce8b46dd400006a';
        $field_id = '531ed3a49a21f6e90b00000e';
        $value = 'subscribed';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadContacts($client);
        $resource->updateContactField($contact_id, $field_id, $value);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/contacts/' . $contact_id . '/fields/' . $field_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for removing a contact.
     * @throws ClinchPadAPIException
     */
    public function testDeleteContact()
    {
        $contact_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadContacts($client);
        $resource->deleteContact($contact_id);

        $this->assertEquals('DELETE', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/contacts/' . $contact_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for contact information.
     * @throws ClinchPadAPIException
     */
    public function testGetContactsForLead()
    {
        $lead_id = '52219adccce8b4a68d000070';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadContacts($client);
        $resource->getContactsForLead($lead_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id . '/contacts', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for adding a contact to a lead.
     * @throws ClinchPadAPIException
     */
    public function testAddContactToLead()
    {
        $lead_id = '531ed3a49a21f6e90b00000e';
        $contact_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadContacts($client);
        $resource->addContactToLead($lead_id, $contact_id);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id . '/contacts/' . $contact_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for removing a contact from a lead.
     * @throws ClinchPadAPIException
     */
    public function testRemoveContactFromLead()
    {
        $lead_id = '531ed3a49a21f6e90b00000e';
        $contact_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadContacts($client);
        $resource->removeContactFromLead($lead_id, $contact_id);

        $this->assertEquals('DELETE', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id . '/contacts/' . $contact_id, $client->getClient()->uri);
    }

}
