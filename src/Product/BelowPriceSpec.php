<?php

namespace App\Product;

class BelowPriceSpec extends Spec
{
    private $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function isSatisfiedBy(Product $product): bool
    {
        return $this->price >= $product->price();
    }
}
