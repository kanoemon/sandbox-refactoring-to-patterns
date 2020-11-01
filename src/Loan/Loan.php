<?php

namespace App\Loan;

class Loan
{
    const MILLIS_PER_DAY = 1000*60*60*24;
    const DAYS_PER_YEAR = 365;

    private $paymants = [];
    private $expiry = null;
    private $maturity = null;
    private $commitment;
    private $unusedPercentage;
    private $riskRating;
    private $outstanding;
    private $start;
    private $capitalStrategy;

    public function __construct(float $commitment, float $outstanding, 
                                \DateTimeImmutable $start, ?\DateTimeImmutable $expiry, ?\DateTimeImmutable $maturity, int $riskRating, CapitalStrategy $capitalStrategy)
    {
        $this->commitment = $commitment;
        $this->outstanding = $outstanding;
        $this->start = $start;
        $this->expiry = $expiry;
        $this->maturity = $maturity;
        $this->riskRating = $riskRating;
        $this->capitalStrategy = $capitalStrategy;
    }

    public static function newTermLoan(float $commitment, float $outstanding, 
                                \DateTimeImmutable $start, ?\DateTimeImmutable $maturity, int $riskRating)
    {
        return new Loan($commitment, $outstanding, $start, null, $maturity, $riskRating, new CapitalStrategyTermLoan());
    }

    public static function newRevolver(float $commitment, float $outstanding, 
                                \DateTimeImmutable $start, ?\DateTimeImmutable $expiry, int $riskRating)
    {
        $loan = new Loan($commitment, $outstanding, $start, $expiry, null, $riskRating, new CapitalStrategyRevolver());
        return $loan;
    }

    public static function newAdvisedLine(float $commitment, float $outstanding, 
                                \DateTimeImmutable $start, ?\DateTimeImmutable $expiry, int $riskRating)
    {
        $loan = new Loan($commitment, $outstanding, $start, $expiry, null, $riskRating, new CapitalStrategyAdvisedLine());
        $loan->setUnusedPercentage(2.0);
        return $loan;
    }

    public function getExpiry(): ?\DateTimeImmutable
    {
        return $this->expiry;
    }

    public function getMaturity(): ?\DateTimeImmutable
    {
        return $this->maturity;
    }

    public function setCommitment(float $commitment): void
    {
        $this->commitment = $commitment;
    }

    public function getCommitment(): float
    {
        return $this->commitment;
    }

    public function setUnusedPercentage(float $unusedPercentage): void
    {
        $this->unusedPercentage = $unusedPercentage;
    }

    public function capital(): float
    {
        return $this->capitalStrategy->capital($this);
    }

    public function outstandingRiskAmount(): float
    {
        return $this->outstanding;
    }

    public function unusedRiskAmount(): float
    {
        return 1.0;
    }

    public function getUnusedPercentage(): float
    {
        return $this->unusedPercentage;
    }

    public function duration(): float
    {
        return $this->capitalStrategy->duration($this);
    }

    public function getToday(): \DateTimeImmutable
    {
        return $this->start;
    }

    public function getPayments(): array
    {
        return $this->paymants;
    }

    public function getRiskRating(): float
    {
        return $this->riskRating;
    }
}
