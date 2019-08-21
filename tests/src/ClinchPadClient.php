<?php

namespace ClinchPad\Tests;

use ClinchPad\http\ClinchPadHttpClientInterface;

/**
 * Test ClinchPadlibrary.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadClient extends \ClinchPad\ClinchPadClient
{

    /**
     * @inheritdoc
     */
    public function __construct($api_key, $http_options = [], ClinchPadHttpClientInterface $client = NULL)
    {
        $client = new ClinchPadTestHttpClient();
        parent::__construct($api_key, $http_options, $client);
    }

    public function request($method, $path, $tokens = NULL, $parameters = NULL, $returnAssoc = FALSE)
    {
        return parent::request($method, $path, $tokens, $parameters, $returnAssoc);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

}
