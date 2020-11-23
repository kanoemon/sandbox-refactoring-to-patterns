<?php

namespace App\UnitTest;

class TestResult
{
    protected $runner;
    private $observers = [];

    public function addObservers(TestListener $testListener)
    {
        $this->observers[] = $testListener;
    }

    public function addFailure(Test $test, Throwable $t)
    {
        foreach($this->observers as $observer) {
            $observer->addFailure($this, $test, $t);
        }
    }
}
