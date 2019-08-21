<?php

namespace ClinchPad\Tests;

/**
 * ClinchPadLists library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadUsers extends \ClinchPad\Resource\ClinchPadUsers
{

    /**
     * @inheritdoc
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @inheritdoc
     */
    public function getUsers($parameters = [])
    {
        parent::getUsers($parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26ebcce8b4310e000064',
                    'name' => 'Claire Parson',
                    'email' => 'claire@parsons.com',
                    'role' => (object)[
                        'name' => 'Admin',
                    ],
                ],
                (object)[
                    '_id' => '5221931acce8b45ab700003d',
                    'name' => 'Roger Parson',
                    'email' => 'roger@parsons.com',
                    'role' => (object)[
                        'name' => 'User',
                    ],
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getUser($user_id, $parameters = [])
    {
        parent::getUser($user_id, $parameters);

        $response = (object)[
            '_id' => '5221931acce8b45ab700003d',
            'name' => 'Roger Parson',
            'email' => 'roger@parsons.com',
            'role' => (object)[
                'name' => 'User',
            ],
        ];

        return $response;
    }

}
