<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Escape\Escape;
use App\Escape\NodeFactory;

class EscapeTest extends TestCase
{
    private $nodeFactory;

    public function setUp()
    {
        $this->nodeFactory = new NodeFactory();
    }

    /**
     * @test
     */
    public function escape()
    {
        $escape = new Escape($this->nodeFactory);
        $this->assertSame('&lt;p&gt;"hoge&lt;br&gt;fuga&lt;p&gt;', $escape->escape('<p>"hoge<br>fuga<p>'));
    }

    /**
     * @test
     */
    public function escapeQuote()
    {
        $this->nodeFactory->setShouldEscapeQuote(true);
        $escape = new Escape($this->nodeFactory);

        $this->assertSame('&lt;p&gt;&quot;hoge&lt;br&gt;fuga&lt;p&gt;', $escape->escape('<p>"hoge<br>fuga<p>'));
    }

    /**
     * @test
     */
    public function changeBrToNl()
    {
        $this->nodeFactory->setShouldBrToNl(true);
        $escape = new Escape($this->nodeFactory);

        $this->assertSame('<p>"hoge\nfuga<p>', $escape->escape('<p>"hoge<br>fuga<p>'));
    }
}
