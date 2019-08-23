<?php

namespace ClinchPad\Resource;

use ClinchPad\Exception\ClinchPadAPIException;

/**
 * ClinchPadProducts library.
 *
 * @package ClinchPad
 * @see https://clinchpad.com/api/docs/products
 */
class ClinchPadProducts extends Resource
{

    /**
     * Gets information about all products owned by the authenticated account.
     *
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getProducts($parameters = [])
    {
        return $this->client->request('GET', '/products', [], $parameters);
    }

    /**
     * Gets a ClinchPad product.
     *
     * @param string $product_id
     *   The ID of the product.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getProduct($product_id, $parameters = [])
    {
        $tokens = [
            'product_id' => $product_id,
        ];

        return $this->client->request('GET', '/products/{product_id}', $tokens, $parameters);
    }

    /**
     * Creates a new ClinchPadproduct.
     *
     * @param string $name
     *   The product's name.
     * @param integer $price
     *   The product's email.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function createProduct($name, $price, $parameters = [])
    {
        $parameters += [
            'name' => $name,
            'price' => $price,
        ];

        return $this->client->request('POST', '/products', NULL, $parameters);
    }

    /**
     * Updates a ClinchPad product.
     *
     * @param string $product_id
     *   The ID of the product.
     * @param string $name
     *   The product's name.
     * @param integer $price
     *   The product's email.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function updateProduct($product_id, $parameters = [])
    {
        $tokens = [
            'product_id' => $product_id
        ];

        return $this->client->request('PUT', '/products/{product_id}', $tokens, $parameters);
    }

    /**
     * Deletes a ClinchPad product.
     *
     * @param string $product_id
     *   The ID of the lead.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function deleteProduct($product_id)
    {
        $tokens = [
            'product_id' => $product_id
        ];

        return $this->client->request('DELETE', '/products/{product_id}', $tokens);
    }

    /**
     * Gets ClinchPadproducts for a lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function getProductsForLead($lead_id, $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
        ];

        return $this->client->request('GET', '/leads/{lead_id}/products', $tokens, $parameters);
    }

    /**
     * Adds a ClinchPad product to a lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param string $product_id
     *   The ID of the product.
     * @param int $quantity
     *   The quantity of the product.
     * @param string $discount
     *   The discount percentage (0-100), default 0%
     * @param array $parameters
     *   Associative array of optional request parameters.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function addProductToLead($lead_id, $product_id, $quantity, $discount = "", $parameters = [])
    {
        $tokens = [
            'lead_id' => $lead_id,
            'product_id' => $product_id,
        ];

        $parameters += [
            'quantity' => intval($quantity),
            'discount' => $discount,
        ];

        return $this->client->request('PUT', '/leads/{lead_id}/products/{product_id}', $tokens, $parameters);
    }

    /**
     * Removes a ClinchPad product from a lead.
     *
     * @param string $lead_id
     *   The ID of the lead.
     * @param string $product_id
     *   The ID of the product.
     *
     * @return object
     *
     * @throws ClinchPadAPIException
     */
    public function removeProductFromLead($lead_id, $product_id)
    {
        $tokens = [
            'lead_id' => $lead_id,
            'product_id' => $product_id,
        ];

        return $this->client->request('DELETE', '/leads/{lead_id}/products/{product_id}', $tokens);
    }

}
