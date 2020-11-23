<?php

namespace App\UnitTest;

class TestSuite
{
    private $tests = [];

    public function run(TestResult $testResult)
    {
        foreach($this->tests as $test) {
            if (!$test->main()) {
                $testResult->addFailure($test, new Throwable());
            }
        }
    }

    public function addSuite(Test $test): void
    {
        $this->tests[] = $test;
    }
}
