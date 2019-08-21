<?php

namespace ClinchPad\Resource;

use ClinchPad\exception\ClinchPadAPIException;

/**
 * Client Users library.
 *
 * @package Client
 * @see https://clinchpad.com/api/docs/users
 */
class ClinchPadUsers extends Resource
{
    /**
     * Gets information about all users owned by the authenticated account.
     *
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getUsers($parameters = [])
    {
        return $this->client->request('GET', '/users', NULL, $parameters);
    }

    /**
     * Gets a Client user.
     *
     * @param string $user_id
     *   The ID of the user.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getUser($user_id, $parameters = [])
    {
        $tokens = [
            'user_id' => $user_id,
        ];

        return $this->client->request('GET', '/users/{user_id}', $tokens, $parameters);
    }

}
