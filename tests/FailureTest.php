<?php

use PHPUnit\Framework\TestCase;

class FailureTest extends TestCase {

  /**
   * An incomplete test.
   */
  public function testIncomplete()
  {

  }

  /**
   * A test which fails.
   */
  public function testFailure()
  {
    $this->assertTrue(false, 'A test case has failed as expected.');
  }

  /**
   * A test with an unexpected exception.
   */
  public function testException()
  {
    throw new Exception('This is not expected.');
  }

}
