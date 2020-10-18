<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Tax\NormalTax;
use App\Tax\ReducedTax;

class TaxTest extends TestCase
{
    /**
     * @test
     */
    public function taxIncluded()
    {
        $normalTax = new NormalTax(true);
        $this->assertSame(91, $normalTax->getTax(1000));

        $reducedTax = new ReducedTax(true);
        $this->assertSame(74, $reducedTax->getTax(1000));
    }

    /**
     * @test
     */
    public function taxExcluded()
    {
        $normalTax = new NormalTax(false);
        $this->assertSame(100, $normalTax->getTax(1000));

        $reducedTax = new ReducedTax(false);
        $this->assertSame(80, $reducedTax->getTax(1000));
    }
}
