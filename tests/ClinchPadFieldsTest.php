<?php

namespace ClinchPad\Tests;

use ClinchPad\exception\ClinchPadAPIException;
use PHPUnit\Framework\TestCase;

/**
 * ClinchPadFields test library.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadFieldsTest extends TestCase
{

    /**
     * Tests library functionality for field information.
     * @throws ClinchPadAPIException
     */
    public function testGetFields()
    {
        $lead_id = '52219adccce8b4a68d000070';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadFields($client);
        $resource->getFields($lead_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/'.$lead_id.'/fields', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for field information.
     * @throws ClinchPadAPIException
     */
    public function testGetField()
    {
        $lead_id = '52219adccce8b4a68d000070';
        $field_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadFields($client);
        $resource->getField($lead_id,$field_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/'.$lead_id.'/fields/' . $field_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for creating a field.
     * @throws ClinchPadAPIException
     */
    public function testCreateField()
    {
        $lead_id = '52219adccce8b4a68d000070';
        $name = 'Test Field';
        $value = 'Test value';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadFields($client);
        $resource->createField($lead_id,$name,$value);

        $this->assertEquals('POST', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/'.$lead_id.'/fields', $client->getClient()->uri);

        $this->assertNotEmpty($client->getClient()->options['json']);

        $request_body = $client->getClient()->options['json'];

        $this->assertEquals($name, $request_body->name);
    }

    /**
     * Tests library functionality for updating a field.
     * @throws ClinchPadAPIException
     */
    public function testUpdateField()
    {
        $lead_id = '52219adccce8b4a68d000070';
        $field_id = '52219a33cce8b46dd400006a';
        $value = 'Updated value';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadFields($client);
        $resource->updateField($lead_id, $field_id, $value);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/'.$lead_id.'/fields/' . $field_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for removing a field.
     * @throws ClinchPadAPIException
     */
    public function testDeleteField()
    {
        $lead_id = '52219adccce8b4a68d000070';
        $field_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadFields($client);
        $resource->deleteField($lead_id, $field_id);

        $this->assertEquals('DELETE', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/'.$lead_id.'/fields/' . $field_id, $client->getClient()->uri);
    }

}
