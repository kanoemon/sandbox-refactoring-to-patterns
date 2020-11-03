<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\HtmlParser\Parser;
use App\HtmlParser\Translate;
use App\HtmlParser\StringNode;
use App\HtmlParser\Tag;

class HtmlParserTest extends TestCase
{
    public function testDecodingAmpersand()
    {
        $decodeContent = '';
        $parser = Parser::createParser("The Testing &amp; Refactoring Workshop");
        $parser->setNodeDecoding(true);
        $nodes = $parser->elements();
        foreach($nodes as $node){
            // decoding step
            $decodeContent .= $node->toPlainTextString();
        }
        $this->assertSame("The Testing & Refactoring Workshop", $decodeContent, 'ambersand in string');
        //$this->assertSame("The Testing & Refactoring Workshop", $this->parseToObtainDecodeResult("The Testing &amp; Refactoring Workshop"), 'ambersand in string');
    }

    public function testEscapeRemoveCharacters()
    {
        $decodeContent = '';
        $parser = Parser::createParser("The Testing\n Refactoring Workshop");
        $parser->setRemoveEscapeCharacters(true);
        $nodes = $parser->elements();
        foreach($nodes as $node){
            // decoding step
            $decodeContent .= $node->toPlainTextString();
        }
        $this->assertSame("The Testing Refactoring Workshop", $decodeContent, 'escape characters in string');
        //$this->assertSame("The Testing & Refactoring Workshop", $this->parseToObtainDecodeResult("The Testing &amp; Refactoring Workshop"), 'ambersand in string');
    }

    private function parseToObtainDecodeResult(string $stringToDecode)
    {
        $decodeContent = '';
        $parser = Parser::createParser($stringToDecode);
        $parser->setNodeDecoding(true);
        $nodes = $parser->elements();

        foreach($nodes as $node){
            if ($node instanceof StringNode) {
                // decoding step
                $decodeContent .= Translate::decode($node->toPlainTextString());
            }
            if ($node instanceof Tag) {
                $decodeContent .= $node->toHtml();
            }
        }

        return $decodeContent;
    }
}
