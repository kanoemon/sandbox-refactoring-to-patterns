<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Product\ProductRepository;
use App\Product\Product;
use App\Product\ProductSize;
use App\Product\Color;
use App\Product\ColorSpec;
use App\Product\SizeSpec;
use App\Product\BelowPriceSpec;
use App\Product\CompositeSpec;

class ProductTest extends TestCase
{
    private $repository;
    private $fireTruckProduct;
    private $toyProduct;

    public function setUp()
    {
        $this->fireTruckProduct = new Product('f123', 'Fire Truck', Color::RED, '8.85', ProductSize::MEDIUM);
        $this->toyProduct = new Product('p123', 'Toy', Color::RED, '230.85', ProductSize::NOT_AAPLICABLE);
        $this->repository = new ProductRepository();
        $this->repository->add($this->fireTruckProduct);
        $this->repository->add(new Product('b123', 'Barbie Clasic', Color::YELLOW, '15.85', ProductSize::SMALL));
        $this->repository->add(new Product('f1234', 'Frisbee', Color::PINK, '9.85', ProductSize::LARGE));
        $this->repository->add(new Product('b1235', 'Baseball', Color::WHITE, '8.85', ProductSize::NOT_AAPLICABLE));
        $this->repository->add($this->toyProduct);
    }

    public function testFindByColor()
    {
        $foundProducts = $this->repository->selectBy(new ColorSpec(Color::RED));
        $this->assertCount(2, $foundProducts);
        $this->assertContains($this->fireTruckProduct, $foundProducts);
        $this->assertContains($this->toyProduct, $foundProducts);
    }

    public function testFindByColorSizeAndBelowPrice()
    {
        $specs = new CompositeSpec();
        $specs->add(new ColorSpec(Color::RED));
        $specs->add(new SizeSpec(ProductSize::SMALL));
        $specs->add(new BelowPriceSpec(10.00));
        $foundProducts = $this->repository->selectBy($specs);
        $this->assertCount(0, $foundProducts);
    }
}
