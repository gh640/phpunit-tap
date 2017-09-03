<?php

use PHPUnit\Framework\TestCase;

class SuccessTest extends TestCase {

  public function testTrueIsTrue()
  {
    $this->assertEquals(true, true);
  }

  public function testThatisit()
  {
    $that = 'supercalifragilisticexpialidocious';
    $it = 'supercalifragilisticexpialidocious';
    $this->assertEquals($that, $it);
  }

  /**
   * @expectedException UnexpectedValueException
   */
  public function testException()
  {
    throw new UnexpectedValueException('This is really unexpected.');
  }

}
