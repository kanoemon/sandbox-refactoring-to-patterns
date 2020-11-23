<?php

namespace App\UnitTest\UI;

use App\UnitTest\TestResult;
use App\UnitTest\TestSuite;
use App\UnitTest\Test;
use App\UnitTest\Throwable;
use App\UnitTest\TestListener;

class TestRunner implements TestListener
{
    private $fTestResult;
    private $testSuite;

    public function __construct(TestSuite $testSuite)
    {
        $this->testSuite = $testSuite;
    }

    protected function createTestResult(): TestResult
    {
        $testResult = new TestResult();
        $testResult->addObservers($this);
        return $testResult;
    }

    public function runSuite(): void
    {
        $this->fTestResult = $this->createTestResult();
        $this->testSuite->run($this->fTestResult);
    }

    public function addFailure(TestResult $testResult, Test $test, Throwable $t)
    {
        echo '<b>failure.</b>';
    }
}
