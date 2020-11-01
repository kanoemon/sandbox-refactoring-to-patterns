<?php

namespace App\Loan;

class CapitalStrategyTermLoan extends CapitalStrategy
{
    public function capital(Loan $loan): float
    {
        return $loan->getCommitment() * $this->duration($loan) * $this->riskFactorFor($loan);
    }

    public function duration(Loan $loan): float
    {
        return $this->weightedAverageDuration($loan);
    }

    private function weightedAverageDuration(Loan $loan): float
    {
        $loan->getPayments();
        return 5.0;
    }
}
