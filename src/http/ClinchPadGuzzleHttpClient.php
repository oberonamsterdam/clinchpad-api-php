<?php

namespace ClinchPad\http;

use GuzzleHttp\Client;

/**
 * An HTTP client for use with the ClinchPadAPI using Guzzle.
 *
 * @package ClinchPadClient
 */
class ClinchPadGuzzleHttpClient implements ClinchPadHttpClientInterface
{

    /**
     * The GuzzleHttp client.
     *
     * @var Client $client
     */
    private $guzzle;

    /**
     * ClinchPadGuzzleHttpClient constructor.
     *
     * @param array $config
     *   Guzzle HTTP configuration options.
     *   Currently supports only 'timeout'.
     */
    public function __construct($config = [])
    {
        $this->guzzle = new Client($config);
    }

    /**
     * @inheritdoc
     */
    public function handleRequest($api_key, $method, $uri = '', $options = [], $parameters = [], $returnAssoc = FALSE)
    {
        if (!empty($parameters)) {
            if ($method == 'GET') {
                // Send parameters as query string parameters.
                $options['query'] = $parameters;
            } else {
                // Send parameters as JSON in request body.
                $options['json'] = (object)$parameters;
            }
        }

        $options += [
            'auth' => ['api-key',$api_key],
        ];

        $response = $this->guzzle->request($method, $uri, $options);
        $data = json_decode($response->getBody(), $returnAssoc);

        return $data;
    }

}
