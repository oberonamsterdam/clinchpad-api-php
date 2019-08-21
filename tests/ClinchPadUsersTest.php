<?php

namespace ClinchPad\Tests;

use ClinchPad\exception\ClinchPadAPIException;
use PHPUnit\Framework\TestCase;

/**
 * ClinchPadUsers test library.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadUsersTest extends TestCase
{

    /**
     * Tests library functionality for user information.
     * @throws ClinchPadAPIException
     */
    public function testGetUsers()
    {
        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadUsers($client);
        $resource->getUsers();

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/users', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for user information.
     * @throws ClinchPadAPIException
     */
    public function testGetUser()
    {
        $user_id = '521f26ebcce8b4310e000064';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadUsers($client);
        $resource->getUser($user_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/users/' . $user_id, $client->getClient()->uri);
    }


}
