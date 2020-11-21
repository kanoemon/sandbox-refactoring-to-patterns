<?php

namespace App\Loan;

class CapitalStrategyRevolver extends CapitalStrategy
{
    public function capital(Loan $loan): float
    {
        return parent::capital($loan) + $this->unusedCapital($loan);
    }

    protected function riskAmountFor(Loan $loan): float
    {
        return $loan->outstandingRiskAmount();
    }

    private function unusedCapital(Loan $loan): float
    {
        return $loan->unusedRiskAmount() * $this->duration($loan) * $this->unusedRiskFactorFor($loan);
    }
}
