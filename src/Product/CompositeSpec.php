<?php

namespace App\Product;

class CompositeSpec extends Spec
{
    private $specs = [];

    public function __construct()
    {
    }

    public function add(Spec $spec): void
    {
        $this->specs[] = $spec;
    }

    public function getSpecs(): array
    {
        return $this->specs;
    }

    public function isSatisfiedBy(Product $product): bool
    {
        $satisfiesAllSpecs = true;
        foreach($this->getSpecs() as $productSpec) {
            $satisfiesAllSpecs &= $productSpec->isSatisfiedBy($product);
        }
        return $satisfiesAllSpecs;
    }
}
