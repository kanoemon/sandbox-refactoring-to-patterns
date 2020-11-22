<?php

namespace App\Product;

abstract class Spec
{
    abstract function isSatisfiedBy(Product $product): bool;
}
