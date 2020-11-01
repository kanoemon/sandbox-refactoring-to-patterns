<?php

namespace App\Loan;

class RiskFactor
{
    public function forRating(float $riskRating): float
    {
        return 5.0;
    }
}