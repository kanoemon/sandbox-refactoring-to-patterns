<?php

namespace App\Tax;

class ReducedTax
{
    private $includedTax;

    public function __construct($includedTax)
    {
        $this->includedTax = $includedTax;
    }

    public function getTax(int $price)
    {
        if ($this->includedTax) {
            $priceExcludedTax = $price * 100 / (100 + 8);
            return $price - intval(round($priceExcludedTax));
        }
        return $price * 8 / 100;
    }
}
