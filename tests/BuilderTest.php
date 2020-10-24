<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Builder\DOMPresenter;
use App\Builder\JsonPresenter;

class BuilderTest extends TestCase
{
    /**
     * @test
     */
    public function DOMを生成する()
    {
        $data = [
            'orders' => '',
        ];
        $presenter = new DOMPresenter($data);
        $this->assertSame('<orders></orders>', $presenter->markup());

        $presenter->addBelow(['order' => 'test']);
        $this->assertSame('<orders></orders><order>test</order>', $presenter->markup());
    }

    /**
     * @test
     */
    public function jsonを生成する()
    {
        $data = [
            'orders' => '',
        ];
        $presenter = new JsonPresenter($data);
        $this->assertSame('{"orders":""}', $presenter->markup());

        $presenter->addBelow(['order' => 'test']);
        $this->assertSame('{"orders":"","order":"test"}', $presenter->markup());
    }
}
