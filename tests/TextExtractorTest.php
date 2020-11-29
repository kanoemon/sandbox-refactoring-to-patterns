<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\TextExtractor\TextExtractor;

class TextExtractorTest extends TestCase
{
    public function test()
    {
        $textExtractor = new TextExtractor();
        $this->assertSame('apple<a href="http://xxx.com">example</a>&lt;a href=&quot;http://xxx.com&quot;&gt;example&lt;/a&gt;', $textExtractor->extractText());
    }
}
