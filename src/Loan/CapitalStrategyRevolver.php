<?php

namespace App\Loan;

class CapitalStrategyRevolver extends CapitalStrategy
{
    public function capital(Loan $loan): float
    {
        return ($loan->outstandingRiskAmount() * $this->duration($loan) * $this->riskFactorFor($loan))
        + ($loan->unusedRiskAmount() * $this->duration($loan) * $this->unusedRiskFactorFor($loan));
    }
}
