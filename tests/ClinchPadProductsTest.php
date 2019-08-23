<?php

namespace ClinchPad\Tests;

use ClinchPad\exception\ClinchPadAPIException;
use PHPUnit\Framework\TestCase;

/**
 * ClinchPadProducts test library.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadProductsTest extends TestCase
{

    /**
     * Tests library functionality for product information.
     * @throws ClinchPadAPIException
     */
    public function testGetProducts()
    {
        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadProducts($client);
        $resource->getProducts();

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/products', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for product information.
     * @throws ClinchPadAPIException
     */
    public function testGetProduct()
    {
        $product_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadProducts($client);
        $resource->getProduct($product_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/products/' . $product_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for creating a product.
     * @throws ClinchPadAPIException
     */
    public function testCreateProduct()
    {
        $name = 'Test Product';
        $price = 2000;

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadProducts($client);
        $resource->createProduct($name, $price);

        $this->assertEquals('POST', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/products', $client->getClient()->uri);

        $this->assertNotEmpty($client->getClient()->options['json']);

        $request_body = $client->getClient()->options['json'];

        $this->assertEquals($name, $request_body->name);
    }

    /**
     * Tests library functionality for updating a product.
     * @throws ClinchPadAPIException
     */
    public function testUpdateProduct()
    {
        $product_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadProducts($client);
        $resource->updateProduct($product_id);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/products/' . $product_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for removing a product.
     * @throws ClinchPadAPIException
     */
    public function testDeleteProduct()
    {
        $product_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadProducts($client);
        $resource->deleteProduct($product_id);

        $this->assertEquals('DELETE', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/products/' . $product_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for product information.
     * @throws ClinchPadAPIException
     */
    public function testGetProductsForLead()
    {
        $lead_id = '52219adccce8b4a68d000070';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadProducts($client);
        $resource->getProductsForLead($lead_id);

        $this->assertEquals('GET', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id . '/products', $client->getClient()->uri);
    }

    /**
     * Tests library functionality for adding a product to a lead.
     * @throws ClinchPadAPIException
     */
    public function testAddProductToLead()
    {
        $lead_id = '531ed3a49a21f6e90b00000e';
        $product_id = '52219a33cce8b46dd400006a';
        $quantity = 1;
        $discount = 10.00;

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadProducts($client);
        $resource->addProductToLead($lead_id, $product_id, $quantity, $discount);

        $this->assertEquals('PUT', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id . '/products/' . $product_id, $client->getClient()->uri);
    }

    /**
     * Tests library functionality for removing a product from a lead.
     * @throws ClinchPadAPIException
     */
    public function testRemoveProductFromLead()
    {
        $lead_id = '531ed3a49a21f6e90b00000e';
        $product_id = '52219a33cce8b46dd400006a';

        $client = new ClinchPadClient('api-key');
        $resource = new ClinchPadProducts($client);
        $resource->removeProductFromLead($lead_id, $product_id);

        $this->assertEquals('DELETE', $client->getClient()->method);
        $this->assertEquals($client->getEndpoint() . '/leads/' . $lead_id . '/products/' . $product_id, $client->getClient()->uri);
    }

}
