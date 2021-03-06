<?php

namespace ClinchPad\http;

use Exception;

/**
 * An HTTP client for use with the ClinchPadAPI using cURL.
 *
 * @package ClinchPadClient
 */
class ClinchPadCurlHttpClient implements ClinchPadHttpClientInterface
{

    private $config;

    /**
     * ClinchPadCurlHttpClient constructor.
     *
     * @param array $config
     *   cURL configuration options.
     *   Currently supports only 'timeout'.
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * @inheritdoc
     */
    public function handleRequest($api_key, $method, $uri = '', $options = [], $parameters = [], $returnAssoc = FALSE)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_TIMEOUT, $this->config['timeout']);

        // Set request headers.
        $headers = [];

        if (isset($options['headers'])) {
            foreach ($options['headers'] as $header_name => $header_value) {
                $headers[] = $header_name . ': ' . $header_value;
            }
        }

        $headers[] = 'Authorization: Basic ' . base64_encode("api-key:$api_key");

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // Set request content.
            switch ($method) {
                case 'POST':
                    curl_setopt($ch, CURLOPT_POST, TRUE);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode((object)$parameters));
                    break;

                case 'GET':
                    $uri .= '?' . http_build_query($parameters);
                    break;

                case 'PUT':
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode((object)$parameters));
                    break;

                case 'PATCH':
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode((object)$parameters));
                    break;

                case 'DELETE':
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                    break;

                default:
                    // Throw Exception for unsupported request method.
                    throw new Exception('Unsupported HTTP request method: ' . $method);
            }

            curl_setopt($ch, CURLOPT_URL, $uri);

            // Get response as a string.
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);

            $http_code = 0;
            $error = NULL;

            // Check for cURL error before checking HTTP response code.
            if (curl_errno($ch)) {
                $error = curl_error($ch);
            } else {
                // Check the HTTP response code.
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($http_code != 200) {

                    if ($response_data = json_decode($response)) {
                        $error = $response_data->detail;
                    } else {
                        $error = $response;
                    }
                }
            }

            // Close cURL connection.
            curl_close($ch);

            if (!empty($error)) {
                throw new Exception($error, $http_code);
            }

            return json_decode($response, $returnAssoc);

    }

}
