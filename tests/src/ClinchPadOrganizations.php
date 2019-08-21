<?php

namespace ClinchPad\Tests;

/**
 * ClinchPadLists library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadOrganizations extends \ClinchPad\Resource\ClinchPadOrganizations
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
    public function getOrganizations($parameters = [])
    {
        parent::getOrganizations($parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26eccce8b4310e000075',
                    'name' => 'Foo Organization',
                    'email' => 'info@foocorp.com',
                    'phone' => '5553336666',
                    'website' => 'http://www.foocorp.com',
                    'address' => NULL,
                    'fields' => (object)[
                        '_id' => '531ed3a49a21f6e90b00000e',
                        'name' => 'custom organization field',
                        'value' => 'Monthly',
                    ],
                    'contacts' => (object)[
                        '_id' => '521f26eccce8b4310e000076',
                        'name' => 'Foo Guy',
                        'designation' => NULL,
                        'email' => 'fooguy@foocorp.com',
                        'phone' => '5553331234',
                    ],
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getOrganization($organization_id, $parameters = [])
    {
        parent::getOrganization($organization_id, $parameters);

        $response = (object)[
            '_id' => $organization_id,
            'name' => 'Foo Organization',
            'email' => 'info@foocorp.com',
            'phone' => '5553336666',
            'website' => 'http://www.foocorp.com',
            'address' => NULL,
            'fields' => (object)[
                '_id' => '531ed3a49a21f6e90b00000e',
                'name' => 'custom organization field',
                'value' => 'Monthly',
            ],
            'contacts' => (object)[
                '_id' => '521f26eccce8b4310e000076',
                'name' => 'Foo Guy',
                'designation' => NULL,
                'email' => 'fooguy@foocorp.com',
                'phone' => '5553331234',
            ],
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function createOrganization($name, $parameters = [])
    {
        parent::createOrganization($name, $parameters);

    $response = (object)[
        '_id' => '521f26eccce8b4310e000075',
        'name' => $name,
        'email' => 'info@foocorp.com',
        'phone' => '5553336666',
        'website' => 'http://www.foocorp.com',
        'address' => NULL,
        'fields' => (object)[
            '_id' => '531ed3a49a21f6e90b00000e',
            'name' => 'custom organization field',
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
    public function updateOrganization($organization_id, $name, $parameters = [])
    {
        parent::updateOrganization($organization_id, $name, $parameters);

        $response = (object)[
            '_id' => $organization_id,
            'name' => $name,
            'email' => 'info@foocorp.com',
            'phone' => '5553336666',
            'website' => 'http://www.foocorp.com',
            'address' => NULL,
            'fields' => (object)[
                '_id' => '531ed3a49a21f6e90b00000e',
                'name' => 'custom organization field',
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
    public function updateOrganizationField($organization_id, $fields_id, $value, $parameters = [])
    {
        parent::updateOrganizationField($organization_id, $fields_id, $value, $parameters);

        $response = (object)[
            '_id' => $organization_id,
            'name' => 'Foo Organization',
            'email' => 'info@foocorp.com',
            'phone' => '5553336666',
            'website' => 'http://www.foocorp.com',
            'address' => NULL,
            'fields' => (object)[
                '_id' => $fields_id,
                'name' => 'custom organization field',
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
    public function deleteOrganization($organization_id)
    {
        parent::deleteOrganization($organization_id);

        $response = (object)[];

        return $response;
    }

}
