<?php

namespace ClinchPad;

use ClinchPad\Exception\ClinchPadAPIException;
use ClinchPad\http\ClinchPadCurlHttpClient;
use ClinchPad\http\ClinchPadGuzzleHttpClient;
use ClinchPad\http\ClinchPadHttpClientInterface;
use Exception;

/**
 * ClinchPad ClinchPadlibrary.
 *
 * @package ClinchPad
 * @see https://clinchpad.com/api/docs
 */
class ClinchPadClient
{

    const VERSION = '1.0.0';

    /**
     * API version.
     *
     * @var string $version
     */
    public $version = self::VERSION;

    /**
     * The HTTP client.
     *
     * @var ClinchPadHttpClientInterface $client
     */
    protected $client;

    /**
     * The REST API endpoint.
     *
     * @var string $endpoint
     */
    protected $endpoint = 'https://www.clinchpad.com/api/v1';

    /**
     * The ClinchPadAPI key to authenticate with.
     *
     * @var string $api_key
     */
    private $api_key;

    /**
     * A ClinchPadAPI error code to return with every API response.
     *
     * Used for testing / debugging error handling.
     * See ERROR_CODE_* constants.
     *
     * @var string $debug_error_code
     */
    private $debug_error_code;

    /**
     * ClinchPadconstructor.
     *
     * @param string $api_key
     *   The ClinchPadAPI key.
     * @param array $http_options
     *   HTTP client options.
     * @param ClinchPadHttpClientInterface $client
     *   Optional custom HTTP client. $http_options are ignored if this is set.
     */
    public function __construct($api_key, $http_options = [], ClinchPadHttpClientInterface $client = NULL)
    {
        $this->api_key = $api_key;

        if (!empty($client)) {
            $this->client = $client;
        } else {
            $this->client = $this->getDefaultHttpClient($http_options);
        }
    }

    /**
     * Instantiates a default HTTP client based on the local environment.
     *
     * @param array $http_options
     *   HTTP client options.
     *
     * @return ClinchPadHttpClientInterface
     *   The HTTP client.
     */
    private function getDefaultHttpClient($http_options)
    {
        // Process HTTP options.
        // Handle deprecated 'timeout' argument.
        if (is_int($http_options)) {
            $http_options = [
                'timeout' => $http_options,
            ];
        }

        // Default timeout is 10 seconds.
        $http_options += [
            'timeout' => 10,
        ];

        $client = NULL;

        // Use cURL HTTP client if PHP version is below 5.5.0.
        // Use Guzzle client otherwise.
        if (version_compare(phpversion(), '5.5.0', '<')) {
            $client = new ClinchPadCurlHttpClient($http_options);
        } else {
            $client = new ClinchPadGuzzleHttpClient($http_options);
        }

        return $client;
    }

    /**
     * Makes a request to the ClinchPadAPI.
     *
     * @param string $method
     *   The REST method to use when making the request.
     * @param string $path
     *   The API path to request.
     * @param array $tokens
     *   Associative array of tokens and values to replace in the path.
     * @param array $parameters
     *   Associative array of parameters to send in the request body.
     * @param bool $returnAssoc
     *   TRUE to return ClinchPadAPI response as an associative array.
     *
     * @return mixed
     *   Object or Array if $returnAssoc is TRUE.
     *
     * @throws ClinchPadAPIException
     */
    public function request($method, $path, $tokens = NULL, $parameters = NULL, $returnAssoc = FALSE)
    {
        try {

            if (!empty($tokens)) {
                foreach ($tokens as $key => $value) {
                    $path = str_replace('{' . $key . '}', $value, $path);
                }
            }

            $options = [];

            // Add trigger error header if a debug error code has been set.
            if (!empty($this->debug_error_code)) {
                $options['headers']['X-Trigger-Error'] = $this->debug_error_code;
            }

            return $this->client->handleRequest($this->api_key, $method, $this->endpoint . $path, $options, $parameters, $returnAssoc);

        } catch (Exception $e) {

            throw new ClinchPadAPIException($e->getMessage(),0,$e);
        }

    }

}
