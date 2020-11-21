<?php

namespace App\Loan;

class CapitalStrategyTermLoan extends CapitalStrategy
{
    public function duration(Loan $loan): float
    {
        return $this->weightedAverageDuration($loan);
    }

    private function weightedAverageDuration(Loan $loan): float
    {
        $loan->getPayments();
        return 5.0;
    }

    protected function riskAmountFor(Loan $loan): float
    {
        return  $loan->getCommitment();
    }
}
