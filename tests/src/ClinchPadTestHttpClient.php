<?php

namespace ClinchPad\Tests;

use ClinchPad\http\ClinchPadHttpClientInterface;

/**
 * A dummy HTTP client used when running unit tests.
 * Does not make any real API requests.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadTestHttpClient implements ClinchPadHttpClientInterface {

  public $method;

  public $uri;

  public $options;

  /**
   * @inheritdoc
   */
  public function handleRequest($api_key, $method, $uri = '', $options = [], $parameters = [], $returnAssoc = FALSE) {
    if (!empty($parameters)) {
      if ($method == 'GET') {
        // Send parameters as query string parameters.
        $options['query'] = $parameters;
      }
      else {
        // Send parameters as JSON in request body.
        $options['json'] = (object) $parameters;
      }
    }

    $this->method = $method;
    $this->uri = $uri;
    $this->options = $options;

    return new ClinchPadTestHttpResponse();
  }

}
