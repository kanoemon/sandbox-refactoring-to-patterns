<?php

namespace App\UnitTest;

interface TestListener
{
    public function addFailure(TestResult $testResult, Test $test, Throwable $t);
}
