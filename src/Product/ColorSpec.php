<?php

namespace App\Product;

class ColorSpec extends Spec
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function isSatisfiedBy(Product $product): bool
    {
        return $this->name === $product->color();
    }
}
