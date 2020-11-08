<?php

namespace App\Shopping;

class OrdersWriter
{
    const PRPDUCT_SIZE_NOT_APPLICABLE = 999;

    private $orders;

    public function __construct(Orders $orders)
    {
        $this->orders = $orders;
    }

    public function getContents(): string
    {
        return $this->writeOrderTo();
    }

    private function writeOrderTo(): string
    {
        $ordersTag = new TagNode('orders');
        for($i = 0; $i < $this->orders->getOrderCount(); $i++) {
            $order = $this->orders->getOrder($i);
            $orderTag = new TagNode('order');
            $orderTag->addAttribute('id', $order->getOrderId());
            $this->writeProductsTo($orderTag, $order);
            $ordersTag->add($orderTag);
        }
        return $ordersTag->toString();
    }

    private function writeProductsTo(TagNode $orderTag, Order $order): void
    {
        for($i = 0; $i < $order->getProductCount(); $i++) {
            $product = $order->getProduct($i);
            $productTag = new TagNode('product');
            $productTag->addAttribute('id', $product->getId());
            $productTag->addAttribute('color', $product->getColor());
            if ($product->getSize() !== self::PRPDUCT_SIZE_NOT_APPLICABLE) {
                $productTag->addAttribute('size', $product->getSize());
            }
            $this->writePriceTo($productTag, $product);
            $productTag->addValue($product->getName());
            $orderTag->add($productTag);
            $productTag->toString();
        }
    }

    private function writePriceTo(TagNode $productTag, Product $product): void
    {
        $priceNode = new TagNode('price');
        $priceNode->addAttribute('currency', $product->getCurrency());
        $priceNode->addValue($product->getPrice());
        $productTag->add($priceNode);
    }
}
