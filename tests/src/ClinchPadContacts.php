<?php

namespace ClinchPad\Tests;

/**
 * ClinchPadLists library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadContacts extends \ClinchPad\Resource\ClinchPadContacts
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
    public function getContacts($parameters = [])
    {
        parent::getContacts($parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26eccce8b4310e00006b',
                    'name' => 'Default',
                    'email' => 'default@test.com',
                    'custom_fields' => (object)[
                        '_id' => '531ed3a49a21f6e90b00000e',
                        'name' => 'Newsletter',
                        'value' => NULL,
                    ],
                ],
                (object)[
                    '_id' => '52219a33cce8b46dd400006a',
                    'name' => 'Contact 1"',
                    'email' => 'contact1@test.com',
                    'custom_fields' => (object)[
                        '_id' => '531ed3a49a21f6e90b00000e',
                        'name' => 'Newsletter',
                        'value' => 'unsubscribed',
                    ],
                ],
                (object)[
                    '_id' => '52219adccce8b4a68d000070',
                    'name' => 'Contact 2',
                    'email' => 'contact2@test.com',
                    'custom_fields' => (object)[
                        '_id' => '531ed3a49a21f6e90b00000e',
                        'name' => 'Newsletter',
                        'value' => 'subscribed',
                    ],
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getContact($contact_id, $parameters = [])
    {
        parent::getContact($contact_id, $parameters);

        $response = (object)[
            '_id' => $contact_id,
            'name' => 'Test Contact',
            'email' => 'test@test.com',
            'custom_fields' => (object)[
                '_id' => '531ed3a49a21f6e90b00000e',
                'name' => 'Newsletter',
                'value' => 'subscribed',
            ],
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function createContact($name, $email, $parameters = [])
    {
        parent::createContact($name, $email, $parameters);

    $response = (object)[
        '_id' => '52219adccce8b4a68d000070',
        'name' => $name,
        'email' => $email,
        'custom_fields' => (object)[
            '_id' => '531ed3a49a21f6e90b00000e',
            'name' => 'Newsletter',
            'value' => NULL,
        ],
    ];

    foreach ($parameters as $key => $value) {
        $response->{$key} = $value;
    }

    return $response;
  }

    /**
     * @inheritdoc
     */
    public function updateContact($contact_id, $parameters = [])
    {
        parent::updateContact($contact_id, $parameters);

        $response = (object)[
            '_id' => $contact_id,
            'name' => 'Updated contact',
            'email' => 'updated@email.com',
            'custom_fields' => (object)[
                '_id' => '531ed3a49a21f6e90b00000e',
                'name' => 'Newsletter',
                'value' => 'subscribed',
            ],
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function updateContactField($contact_id, $fields_id, $value, $parameters = [])
    {
        parent::updateContactField($contact_id, $fields_id, $value, $parameters);

        $response = (object)[
            '_id' => $contact_id,
            'name' => 'Test Contact',
            'email' => 'test@test.com',
            'custom_fields' => (object)[
                '_id' => $fields_id,
                'name' => 'Newsletter',
                'value' => $value,
            ],
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function deleteContact($contact_id)
    {
        parent::deleteContact($contact_id);

        $response = (object)[];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getContactsForLead($lead_id, $parameters = [])
    {
        parent::getContactsForLead($lead_id, $parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26eccce8b4310e00006b',
                    'name' => 'Default',
                    'email' => 'default@test.com',
                    'custom_fields' => (object)[
                        '_id' => '531ed3a49a21f6e90b00000e',
                        'name' => 'Newsletter',
                        'value' => NULL,
                    ],
                ],
                (object)[
                    '_id' => '52219adccce8b4a68d000070',
                    'name' => 'Contact 2',
                    'email' => 'contact2@test.com',
                    'custom_fields' => (object)[
                        '_id' => '531ed3a49a21f6e90b00000e',
                        'name' => 'Newsletter',
                        'value' => 'subscribed',
                    ],
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function addContactToLead($lead_id, $contact_id, $parameters = [])
    {
        parent::addContactToLead($lead_id, $contact_id, $parameters);

        $response = (object)[
            '_id' => $contact_id,
            'name' => 'Test Contact',
            'email' => 'test@test.com',
            'custom_fields' => (object)[
                '_id' => '531ed3a49a21f6e90b00000e',
                'name' => 'Newsletter',
                'value' => 'subscribed',
            ],
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function removeContactFromLead($lead_id, $contact_id)
    {
        parent::removeContactFromLead($lead_id, $contact_id);

        $response = (object)[];

        return $response;
    }

}
