<?php

namespace App\Loan;

class CapitalStrategyAdvisedLine extends CapitalStrategy
{
    protected function riskAmountFor(Loan $loan): float
    {
        return  $loan->getCommitment() * $loan->getUnusedPercentage();
    }
}
