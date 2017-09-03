<?php

namespace gh640\PhpunitTap;

/**
 * A TAP result printer.
 *
 * Most of the code is blatantly copied from the PHPUnit official TAP logger.
 * https://github.com/sebastianbergmann/phpunit/blob/5.7/src/Util/Log/TAP.php
 */
class TapResultPrinter extends \PHPUnit_TextUI_ResultPrinter
{

    /**
     * @var int
     */
    protected $testNumber = 0;

    /**
     * @var int
     */
    protected $testSuiteLevel = 0;

    /**
     * @var bool
     */
    protected $testSuccessful = true;

    public function __construct($out = null, $verbose = false, $colors = self::COLOR_DEFAULT, $debug = false, $numberOfColumns = 80, $reverse = false)
    {
        parent::__construct($out, $verbose, $colors, $debug, $numberOfColumns, $reverse);
        $this->write("TAP version 13\n");
    }

    /**
     * An error occurred.
     *
     * @param \PHPUnit_Framework_Test $test
     * @param \Exception              $e
     * @param float                  $time
     */
    public function addError(\PHPUnit_Framework_Test $test, \Exception $e, $time)
    {
        $this->writeNotOk($test, 'Error');
    }

    /**
     * A warning occurred.
     *
     * @param \PHPUnit_Framework_Test    $test
     * @param PHPUnit_Framework_Warning $e
     * @param float                     $time
     */
    public function addWarning(\PHPUnit_Framework_Test $test, \PHPUnit_Framework_Warning $e, $time)
    {
        $this->writeNotOk($test, 'Warning');
    }

    /**
     * A failure occurred.
     *
     * @param \PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(\PHPUnit_Framework_Test $test, \PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        $this->writeNotOk($test, 'Failure');
        $message = explode(
            "\n",
            \PHPUnit_Framework_TestFailure::exceptionToString($e)
        );
        $diagnostic = [
          'message'  => $message[0],
          'severity' => 'fail'
        ];
        if ($e instanceof \PHPUnit_Framework_ExpectationFailedException) {
            $cf = $e->getComparisonFailure();
            if ($cf !== null) {
                $diagnostic['data'] = [
                  'got'      => $cf->getActual(),
                  'expected' => $cf->getExpected()
                ];
            }
        }
        $yaml = new \Symfony\Component\Yaml\Dumper;
        $this->write(
            sprintf(
                "  ---\n%s  ...\n",
                $yaml->dump($diagnostic, 2, 2)
            )
        );
    }

    /**
     * Incomplete test.
     *
     * @param \PHPUnit_Framework_Test $test
     * @param \Exception              $e
     * @param float                  $time
     */
    public function addIncompleteTest(\PHPUnit_Framework_Test $test, \Exception $e, $time)
    {
        $this->writeNotOk($test, '', 'TODO Incomplete Test');
    }

    /**
     * Risky test.
     *
     * @param \PHPUnit_Framework_Test $test
     * @param \Exception              $e
     * @param float                  $time
     */
    public function addRiskyTest(\PHPUnit_Framework_Test $test, \Exception $e, $time)
    {
        $this->write(
            sprintf(
                "ok %d - # RISKY%s\n",
                $this->testNumber,
                $e->getMessage() != '' ? ' ' . $e->getMessage() : ''
            )
        );
        $this->testSuccessful = false;
    }

    /**
     * Skipped test.
     *
     * @param \PHPUnit_Framework_Test $test
     * @param \Exception              $e
     * @param float                  $time
     */
    public function addSkippedTest(\PHPUnit_Framework_Test $test, \Exception $e, $time)
    {
        $this->write(
            sprintf(
                "ok %d - # SKIP%s\n",
                $this->testNumber,
                $e->getMessage() != '' ? ' ' . $e->getMessage() : ''
            )
        );
        $this->testSuccessful = false;
    }

    /**
     * A testsuite started.
     *
     * @param PHPUnit_Framework_TestSuite $suite
     */
    public function startTestSuite(\PHPUnit_Framework_TestSuite $suite)
    {
        $this->testSuiteLevel++;
    }

    /**
     * A testsuite ended.
     *
     * @param PHPUnit_Framework_TestSuite $suite
     */
    public function endTestSuite(\PHPUnit_Framework_TestSuite $suite)
    {
        $this->testSuiteLevel--;
        if ($this->testSuiteLevel == 0) {
            $this->write(sprintf("1..%d\n", $this->testNumber));
        }
    }

    /**
     * A test started.
     *
     * @param \PHPUnit_Framework_Test $test
     */
    public function startTest(\PHPUnit_Framework_Test $test)
    {
        $this->testNumber++;
        $this->testSuccessful = true;
    }

    /**
     * A test ended.
     *
     * @param \PHPUnit_Framework_Test $test
     * @param float                  $time
     */
    public function endTest(\PHPUnit_Framework_Test $test, $time)
    {
        if ($this->testSuccessful === true) {
            $this->write(
                sprintf(
                    "ok %d - %s\n",
                    $this->testNumber,
                    \PHPUnit_Util_Test::describe($test)
                )
            );
        }
        $this->writeDiagnostics($test);
    }

    /**
     * @param \PHPUnit_Framework_Test $test
     * @param string                 $prefix
     * @param string                 $directive
     */
    protected function writeNotOk(\PHPUnit_Framework_Test $test, $prefix = '', $directive = '')
    {
        $this->write(
            sprintf(
                "not ok %d - %s%s%s\n",
                $this->testNumber,
                $prefix != '' ? $prefix . ': ' : '',
                \PHPUnit_Util_Test::describe($test),
                $directive != '' ? ' # ' . $directive : ''
            )
        );
        $this->testSuccessful = false;
    }

    /**
     * @param \PHPUnit_Framework_Test $test
     */
    private function writeDiagnostics(\PHPUnit_Framework_Test $test)
    {
        if (!$test instanceof \PHPUnit_Framework_TestCase) {
            return;
        }

        if (!$test->hasOutput()) {
            return;
        }

        foreach (explode("\n", trim($test->getActualOutput())) as $line) {
            $this->write(
                sprintf(
                    "# %s\n",
                    $line
                )
            );
        }
    }

}
