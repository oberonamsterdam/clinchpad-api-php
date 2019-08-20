<?php

namespace ClinchPad\Tests;

use GuzzleHttp\Psr7\Response;

/**
 * Test HTTP Response.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadTestHttpResponse extends Response {

  public function getBody() {
    return '{}';
  }

}
