<?php

namespace App\Loan;

class CapitalStrategyAdvisedLine extends CapitalStrategy
{
    public function capital(Loan $loan): float
    {
        return $loan->getCommitment() * $loan->getUnusedPercentage() * $this->duration($loan) * $this->riskFactorFor($loan);
    }
}
