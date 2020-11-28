<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\DOMAndXMLBuilder\DOMBuilder;
use App\DOMAndXMLBuilder\XmlBuilder;

class DOMAndXMLBuilderTest extends TestCase
{
    public function testDOMBuilder()
    {
        $builder = new DOMBuilder();
        $builder->addAttribute('hoge', 1);
        $this->assertSame('<hoge>1</hoge>', $builder->toDOM());
    }

    public function testXmlBuilder()
    {
        $builder = new XmlBuilder();
        $builder->addAttribute('hoge', 1);
        $this->assertSame('<hoge>1</hoge>', $builder->toDOM());
    }
}
