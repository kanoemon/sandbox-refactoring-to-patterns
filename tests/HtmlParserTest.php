<?php

namespace Tests\HtmlParserTest;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Parser;

class HtmlParserTest extends TestCase
{
    /**
     * @test
     */
    public function parse()
    {
        $parser = new Parser();
        $parser->setNodeDecoding(true);
        $parser->setRemoveEscapeCharacters(true);

        $this->assertSame(['p' => 'hogefuga'], $parser->parse('<p>hoge fuga</p>', 1, 1));
    }
}
