<?php

namespace App\Shopping;

class Order
{
    private $orderId;
    private $products = [];

    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getProduct(int $index): Product
    {
        return $this->products[$index];
    }

    public function getProductCount(): int
    {
        return count($this->products);
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }
}
