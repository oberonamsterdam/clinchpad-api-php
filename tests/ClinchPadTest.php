<?php

namespace ClinchPad\Tests;

use PHPUnit\Framework\TestCase;

/**
 * ClinchPadClient library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadTest extends TestCase {

  /**
   * Test the version number.
   */
  public function testVersion() {
    $mc = new ClinchPadClient('api-key');
    $this->assertEquals($mc::VERSION, '1.0.0');
    $this->assertEquals(json_decode(file_get_contents('composer.json'))->version, $mc::VERSION);
  }

}
