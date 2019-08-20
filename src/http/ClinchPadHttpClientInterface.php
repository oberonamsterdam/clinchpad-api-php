<?php

namespace ClinchPad\http;

use Exception;

/**
 * Interface for all HTTP clients used with the ClinchPadClient library.
 *
 * @package ClinchPadClient
 */
interface ClinchPadHttpClientInterface
{

    /**
     * Makes a request to the ClinchPadClient API.
     *
     * @param string $api_key
     *   The API key to authenticate.
     * @param string $method
     *   The REST method to use when making the request.
     * @param string $uri
     *   The API URI to request.
     * @param array $options
     *   Request options. @param array $parameters
     *   Associative array of parameters to send in the request body.
     * @param bool $returnAssoc
     *   TRUE to return ClinchPadClient API response as an associative array.
     *
     * @return object
     *
     * @throws Exception
     * @see ClinchPadClient::request().
     */
    public function handleRequest($api_key, $method, $uri = '', $options = [], $parameters = [], $returnAssoc = FALSE);

}
