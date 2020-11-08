<?php

namespace App\Shopping;

class Orders
{
    private $orders = [];

    public function __construct()
    {
    }

    public function addOrder(Order $order): void
    {
        $this->orders[] = $order;
    }

    public function getOrderCount(): int
    {
        return count($this->orders);
    }

    public function getOrder(int $index): Order
    {
        return $this->orders[$index];
    }
}
