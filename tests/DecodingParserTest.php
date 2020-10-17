<?php

namespace Tests\HtmlParserTest;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Parser;
use App\NodeFactory;

class DecodingParserTest extends TestCase
{
    /**
     * @test
     */
    public function parse()
    {
        $factory = new NodeFactory();
        $factory->setDecodeStringNodes(true);
        $factory->setRemoveEscapeCharacters(true);

        $parser = new Parser();
        $parser->setNodeFactory($factory);

        $this->assertSame(['p' => 'hogefuga'], $parser->parse('<p>hoge fuga</p>', 1, 1));
    }
}
