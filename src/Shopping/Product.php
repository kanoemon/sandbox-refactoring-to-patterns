<?php

namespace App\Shopping;

class Product
{
    private $id;
    private $color;
    private $size;
    private $currency;
    private $price;
    private $name;

    public function __construct(int $id, string $color, int $size, string $currency, int $price, string $name)
    {
        $this->id = $id;
        $this->color = $color;
        $this->size = $size;
        $this->currency = $currency;
        $this->price = $price;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
