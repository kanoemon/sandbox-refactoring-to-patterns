<?php

namespace Tests\HtmlParserTest;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\StringParser;

class HtmlParserTest extends TestCase
{
    /**
     * @test
     */
    public function hoge()
    {
        $stringParser = new StringParser();
        $this->assertSame('hoge', $stringParser->run('hoge', 1, 1));
    }
}
