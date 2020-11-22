<?php

namespace App\Product;

class SizeSpec extends Spec
{
    private $size;

    public function __construct(string $size)
    {
        $this->size = $size;
    }

    public function isSatisfiedBy(Product $product): bool
    {
        return $this->size === $product->size();
    }
}
