<?php

namespace ClinchPad\Tests;

use ClinchPad\exception\ClinchPadAPIException;
use PHPUnit\Framework\TestCase;

/**
 * ClinchPadPipelines test library.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadPipelinesTest extends TestCase
{

    /**
     * Tests library functionality for pipeline information.
     * @throws ClinchPadAPIException
     */
    public function testGetPipelines()
    {
        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadPipelines($client);
        $resource->getPipelines();

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/pipelines', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for pipeline information.
     * @throws ClinchPadAPIException
     */
    public function testGetPipeline()
    {
        $pipeline_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadPipelines($client);
        $resource->getPipeline($pipeline_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/pipelines/' . $pipeline_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for creating a pipeline.
     * @throws ClinchPadAPIException
     */
    public function testCreatePipeline()
    {
        $name = 'Test Pipeline';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadPipelines($client);
        $resource->createPipeline($name);

        $this->assertEquals('POST', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/pipelines', $client->getClient()->uri);

        $this->assertNotEmpty($client->getClient()->options['json']);

        $request_body = $client->getClient()->options['json'];

        $this->assertEquals($name, $request_body->name);
    }

    /**
     * Tests library functionality for updating a pipeline.
     * @throws ClinchPadAPIException
     */
    public function testUpdatePipeline()
    {
        $pipeline_id = '52219a33cce8b46dd400006a';
        $name = 'Test Pipeline Update';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadPipelines($client);
        $resource->updatePipeline($pipeline_id, $name);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/pipelines/' . $pipeline_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for removing a pipeline.
     * @throws ClinchPadAPIException
     */
    public function testDeletePipeline()
    {
        $pipeline_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadPipelines($client);
        $resource->deletePipeline($pipeline_id);

        $this->assertEquals('DELETE', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/pipelines/' . $pipeline_id, $client->getClient()->uri);
    }

}
