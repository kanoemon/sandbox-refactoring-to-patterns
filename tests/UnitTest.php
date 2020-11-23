<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\UnitTest\UI\TestRunner as UITestRunner;
use App\UnitTest\TextUI\TestRunner as TextTestRunner;
use App\UnitTest\TestSuite;
use App\UnitTest\Test;
use App\UnitTest\FailureTest;

class UnitTest extends TestCase
{
    public function testUI()
    {
        $this->expectOutputString('');

        $testSuite = new TestSuite();
        $testSuite->addSuite(new Test());

        $runner = new UITestRunner($testSuite);
        $runner->runSuite();
    }

    public function testUIFailure()
    {
        $this->expectOutputString('<b>failure.</b>');

        $testSuite = new TestSuite();
        $testSuite->addSuite(new FailureTest());

        $runner = new UITestRunner($testSuite);
        $runner->runSuite();
    }

    public function testTextFailure()
    {
        $this->expectOutputString('F');

        $testSuite = new TestSuite();
        $testSuite->addSuite(new FailureTest());

        $runner = new TextTestRunner($testSuite);
        $runner->runSuite();
    }
}
