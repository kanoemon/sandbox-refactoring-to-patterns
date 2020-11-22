<?php

namespace App\Product;

class ProductRepository
{
    private $products = [];

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function selectBy(Spec $spec): array
    {
        $result = [];
        foreach($this->products as $product) {
            if ($spec->isSatisfiedBy($product)) {
                $result[] = $product;
            }
        }
        return $result;
    }
}
