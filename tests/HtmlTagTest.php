<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\HtmlTag\LinkTag;
use App\HtmlTag\FormTag;

class HtmlTagTest extends TestCase
{
    public function testLinkTagToPlainText()
    {
        $linkTag = new LinkTag(1, 1, '', '');
        $this->assertSame('', $linkTag->toPlainTextString());
    }

    public function testLinkTagToHTML()
    {
        $linkTag = new LinkTag(1, 1, '', '');
        $this->assertSame('<a href="http://google.com">link</a>', $linkTag->toHTML());
    }

    public function testFormTagToPlainText()
    {
        $linkTag = new FormTag(1, 1, '', '');
        $this->assertSame('', $linkTag->toPlainTextString());
    }

    public function testFormTagToHTML()
    {
        $linkTag = new FormTag(1, 1, '', '');
        $this->assertSame('<form method="post" action="http://example.com" name="form-name">link</form>', $linkTag->toHTML());
    }
}
