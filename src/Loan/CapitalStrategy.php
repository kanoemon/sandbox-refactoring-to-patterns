<?php

namespace App\Loan;

abstract class CapitalStrategy
{
    const MILLIS_PER_DAY = 1000*60*60*24;
    const DAYS_PER_YEAR = 365;

    abstract public function capital(Loan $loan): float;

    public function duration(Loan $loan): float
    {
        return $this->yearsTo($loan->getExpiry(), $loan);
    }

    private function yearsTo(\DateTimeImmutable $endDate, Loan $loan)
    {
        $beginDate = $loan->getToday();
        $years = ($endDate->getTimestamp() - $beginDate->getTimestamp()) / self::MILLIS_PER_DAY / self::DAYS_PER_YEAR;
        return round($years, 2);
    }

    protected function riskFactorFor(Loan $loan)
    {
        $riskFactor = new RiskFactor();
        return $riskFactor->forRating($loan->getRiskRating());
    }

    protected function unusedRiskFactorFor(Loan $loan)
    {
        $riskFactor = new UnusedRiskFactor();
        return $riskFactor->forRating($loan->getRiskRating());
    }
}
