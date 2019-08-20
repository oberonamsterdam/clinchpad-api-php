<?php

namespace ClinchPad\Tests;

use ClinchPad\exception\ClinchPadAPIException;
use PHPUnit\Framework\TestCase;

/**
 * ClinchPadClient Leads test library.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadLeadsTest extends TestCase
{

    /**
     * Tests library functionality for lead information.
     * @throws ClinchPadAPIException
     */
    public function testGetLeads()
    {
        $pipeline_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadLeads($client);
        $resource->getLeads($pipeline_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for lead information.
     * @throws ClinchPadAPIException
     */
    public function testGetLead()
    {
        $lead_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadLeads($client);
        $resource->getLead($lead_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for creating a lead.
     * @throws ClinchPadAPIException
     */
    public function testCreateLead()
    {
        $pipeline_id = '52219a33cce8b46dd400006a';
        $name = 'Test Lead';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadLeads($client);
        $resource->createLead($name, $pipeline_id);

        $this->assertEquals('POST', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads', $client->getClient()->uri);

        $this->assertNotEmpty($client->getClient()->options['json']);

        $request_body = $client->getClient()->options['json'];

        $this->assertEquals($name, $request_body->name);
    }

    /**
     * Tests library functionality for updating a lead.
     * @throws ClinchPadAPIException
     */
    public function testUpdateLead()
    {
        $lead_id = '52219a33cce8b46dd400006a';
        $name = 'Test Lead Update';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadLeads($client);
        $resource->updateLead($lead_id, $name);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for removing a lead.
     * @throws ClinchPadAPIException
     */
    public function testDeleteLead()
    {
        $lead_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadLeads($client);
        $resource->deleteLead($lead_id);

        $this->assertEquals('DELETE', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id, $client->getClient()->uri);
    }

}
