<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Loan\Loan;

class LoanTest extends TestCase
{
    public function testNewTermLoan()
    {
        $loan = Loan::newTermLoan(1.0, 1.0, new \DateTimeimmutable('2010/1/1'), new \DateTimeImmutable(), 1.0);
        $this->assertSame(5.0, $loan->duration());
        $this->assertSame(25.0, $loan->capital());
    }

    public function testNewAdvisedLine()
    {
        $loan = Loan::newAdvisedLine(1.0, 1.0, new \DateTimeimmutable('2010/1/1'), new \DateTimeImmutable('2020/11/1'), 1.0);
        $this->assertSame(0.01, $loan->duration());
        $this->assertSame(0.1, $loan->capital());
    }

    public function testNewRevolver()
    {
        $loan = Loan::newRevolver(1.0, 1.0, new \DateTimeimmutable('2010/1/1'), new \DateTimeImmutable('2020/11/1'), 1.0);
        $this->assertSame(0.01, $loan->duration());
        $this->assertSame(0.11, $loan->capital());
    }
}
