<?php

namespace ClinchPad\Tests;

/**
 * ClinchPadLists library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadProducts extends \ClinchPad\Resource\ClinchPadProducts
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
    public function getProducts($parameters = [])
    {
        parent::getProducts($parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26edcce8b4310e000079',
                    'name' => 'Foo ABC Product',
                    'price' => 1000,
                    'leads' => (object)[
                        '_id' => '521f26eccce8b4310e000074',
                        'name' => 'Sample Foo',
                    ],
                ],
                (object)[
                    '_id' => '527cd58ecce8b4dc4000001f',
                    'name' => 'New Product',
                    'price' => 2000,
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getProduct($product_id, $parameters = [])
    {
        parent::getProduct($product_id, $parameters);

        $response = (object)[
            '_id' => $product_id,
            'name' => 'Foo ABC Product',
            'price' => 1000,
            'leads' => (object)[
                '_id' => '521f26eccce8b4310e000074',
                'name' => 'Sample Foo',
            ],
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function createProduct($name, $price, $parameters = [])
    {
        parent::createProduct($name, $price, $parameters);

        $response = (object)[
            '_id' => '527cd58ecce8b4dc4000001f',
            'name' => $name,
            'price' => $price,
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function updateProduct($product_id, $parameters = [])
    {
        parent::updateProduct($product_id, $parameters);

        $response = (object)[
            '_id' => $product_id,
            'name' => 'Updated product',
            'price' => 2000,
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function deleteProduct($product_id)
    {
        parent::deleteProduct($product_id);

        $response = (object)[];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getProductsForLead($lead_id, $parameters = [])
    {
        parent::getProductsForLead($lead_id, $parameters);

        $response = (object)[
            [
                (object)[
                    '_id' => '521f26edcce8b4310e00007c',
                    'quantity' => 3,
                    'name' => 'Nice product',
                ],
                (object)[
                    '_id' => '527cd58ecce8b4dc4000001f',
                    'quantity' => 1,
                    'name' => 'Updated product',
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function addProductToLead($lead_id, $product_id, $quantity, $parameters = [])
    {
        parent::addProductToLead($lead_id, $product_id, $quantity, $parameters);

        $response = (object)[
            '_id' => $product_id,
            'quantity' => $quantity,
            'name' => 'Updated product',
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function removeProductFromLead($lead_id, $product_id)
    {
        parent::removeProductFromLead($lead_id, $product_id);

        $response = (object)[];

        return $response;
    }

}
