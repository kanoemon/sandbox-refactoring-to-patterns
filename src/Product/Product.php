<?php

namespace App\Product;

class Product
{
    private $color;
    private $size;
    private $price;

    public function __construct(string $id, string $name, string $color, float $price, string $size)
    {
        $this->color = $color;
        $this->size = $size;
        $this->price = $price;
    }

    public function color(): string
    {
        return $this->color;
    }

    public function size(): string
    {
        return $this->size;
    }

    public function price(): float
    {
        return $this->price;
    }
}
