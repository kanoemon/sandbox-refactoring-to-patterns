<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Shopping\Order;
use App\Shopping\Product;
use App\Shopping\Orders;
use App\Shopping\OrdersWriter;
use App\Shopping\TagNode;

class ShoppingTest extends TestCase
{
    public function testGetContents()
    {
        $order1 = new Order(1);
        $order1->addProduct(new Product(11, 'red', 111, 'USD', 1000, 'apple'));
        $order1->addProduct(new Product(21, 'yellow', 300, 'USD', 500, 'lemon'));

        $order2 = new Order(2);
        $order2->addProduct(new Product(11, 'red', 111, 'USD', 1000, 'apple'));

        $orders = new Orders();
        $orders->addOrder($order1);
        $orders->addOrder($order2);
        $ordersWriter = new OrdersWriter($orders);
        $this->assertSame("<orders><order id='1'><product id='11' color='red' size='111'><price currency='USD'>1000</price>apple</product><product id='21' color='yellow' size='300'><price currency='USD'>500</price>lemon</product></order><order id='2'><product id='11' color='red' size='111'><price currency='USD'>1000</price>apple</product></order></orders>", $ordersWriter->getContents());
    }

    public function testSimpleTagWithOneAttributeAndValue()
    {
        $priceTag = new TagNode('price');
        $priceTag->addAttribute('currency', 'USD');
        $priceTag->addValue(8.95);
        $this->assertSame("<price currency='USD'>8.95</price>", $priceTag->toString());
    }

    public function testCompositeTagOneChild()
    {
        $productTag = new TagNode('product');
        $productTag->add(new TagNode('price'));
        $this->assertSame("<product><price></price></product>", $productTag->toString());
    }

    public function testAddingChildrenAndGrandchildren()
    {
        $ordersTag = new TagNode('orders');
        $orderTag = new TagNode('order');
        $productTag = new TagNode('product');

        $ordersTag->add($orderTag);
        $orderTag->add($productTag);
        $this->assertSame("<orders><order><product></product></order></orders>", $ordersTag->toString());
    }
}
