<?php

namespace ClinchPad\Tests;

use ClinchPad\exception\ClinchPadAPIException;
use PHPUnit\Framework\TestCase;

/**
 * ClinchPadClient Stages test library.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadStagesTest extends TestCase
{

    /**
     * Tests library functionality for stage information.
     * @throws ClinchPadAPIException
     */
    public function testGetStages()
    {
        $pipeline_id = '521f26eccce8b4310e00006b';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadStages($client);
        $resource->getStages($pipeline_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/pipelines/'.$pipeline_id.'/stages', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for stage information.
     * @throws ClinchPadAPIException
     */
    public function testGetStage()
    {
        $pipeline_id = '521f26eccce8b4310e00006b';
        $stage_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadStages($client);
        $resource->getStage($pipeline_id, $stage_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/pipelines/'.$pipeline_id.'/stages/' . $stage_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for updating a stage.
     * @throws ClinchPadAPIException
     */
    public function testUpdateStage()
    {
        $pipeline_id = '521f26eccce8b4310e00006b';
        $stage_id = '52219a33cce8b46dd400006a';
        $name = 'Test Stage Update';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadStages($client);
        $resource->updateStage($pipeline_id, $stage_id, $name);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/pipelines/'.$pipeline_id.'/stages/' . $stage_id, $client->getClient()->uri);
    }

}
