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

  public function testException()
  {
    $this->expectException(UnexpectedValueException::class);

    throw new UnexpectedValueException('This is really unexpected.');
  }

}
