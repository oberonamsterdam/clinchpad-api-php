<?php

namespace ClinchPad\Tests;

use ClinchPad\exception\ClinchPadAPIException;
use PHPUnit\Framework\TestCase;

/**
 * ClinchPadOrganizations test library.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadOrganizationsTest extends TestCase
{

    /**
     * Tests library functionality for organization information.
     * @throws ClinchPadAPIException
     */
    public function testGetOrganizations()
    {
        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadOrganizations($client);
        $resource->getOrganizations();

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/organizations', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for organization information.
     * @throws ClinchPadAPIException
     */
    public function testGetOrganization()
    {
        $organization_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadOrganizations($client);
        $resource->getOrganization($organization_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/organizations/' . $organization_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for creating a organization.
     * @throws ClinchPadAPIException
     */
    public function testCreateOrganization()
    {
        $name = 'Test Organization';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadOrganizations($client);
        $resource->createOrganization($name);

        $this->assertEquals('POST', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/organizations', $client->getClient()->uri);

        $this->assertNotEmpty($client->getClient()->options['json']);

        $request_body = $client->getClient()->options['json'];

        $this->assertEquals($name, $request_body->name);
    }

    /**
     * Tests library functionality for updating a organization.
     * @throws ClinchPadAPIException
     */
    public function testUpdateOrganization()
    {
        $organization_id = '52219a33cce8b46dd400006a';
        $name = 'Test Organization Update';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadOrganizations($client);
        $resource->updateOrganization($organization_id, $name);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/organizations/' . $organization_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for updating a custom field in a organization.
     * @throws ClinchPadAPIException
     */
    public function testUpdateOrganizationField()
    {
        $organization_id = '52219a33cce8b46dd400006a';
        $field_id = '531ed3a49a21f6e90b00000e';
        $value = 'subscribed';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadOrganizations($client);
        $resource->updateOrganizationField($organization_id, $field_id, $value);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/organizations/' . $organization_id . '/fields/' . $field_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for removing a organization.
     * @throws ClinchPadAPIException
     */
    public function testDeleteOrganization()
    {
        $organization_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadOrganizations($client);
        $resource->deleteOrganization($organization_id);

        $this->assertEquals('DELETE', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/organizations/' . $organization_id, $client->getClient()->uri);
    }

}
