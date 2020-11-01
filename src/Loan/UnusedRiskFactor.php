<?php

namespace App\Loan;

class UnusedRiskFactor
{
    public function forRating(float $riskRating): float
    {
        return 6.0;
    }
}