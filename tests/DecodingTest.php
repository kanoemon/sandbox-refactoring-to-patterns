<?php

namespace Tests;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Decode\Decode;
use App\Decode\NodeFactory;

class DecodingTest extends TestCase
{
    private $nodeFactory;

    public function setUp()
    {
        $this->nodeFactory = new NodeFactory();
    }

    /**
     * @test
     */
    public function decode()
    {
        $decode = new Decode($this->nodeFactory);
        $this->assertSame('&lt;p&gt;"hoge&lt;br&gt;fuga&lt;p&gt;', $decode->decode('<p>"hoge<br>fuga<p>'));
    }

    /**
     * @test
     */
    public function decodeQuote()
    {
        $this->nodeFactory->setShouldDecodeQuote(true);
        $decode = new Decode($this->nodeFactory);

        $this->assertSame('&lt;p&gt;&quot;hoge&lt;br&gt;fuga&lt;p&gt;', $decode->decode('<p>"hoge<br>fuga<p>'));
    }

    /**
     * @test
     */
    public function decodeBrToNl()
    {
        $this->nodeFactory->setShouldBrToNl(true);
        $decode = new Decode($this->nodeFactory);

        $this->assertSame('<p>"hoge\nfuga<p>', $decode->decode('<p>"hoge<br>fuga<p>'));
    }
}
