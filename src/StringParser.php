<?php

namespace App;

class StringParser
{
    public function run(string $textBuffer, int $textBegin, int $textEnd): string
    {
        $parser = new Parser();

        $stringNode = StringNode::createStringNode(
            $textBuffer,
            $textBegin,
            $textEnd,
            $parser->shouldDecodeNodes(),
            $parser->shouldRemoveEscapeCharacters()
        );

        return $textBuffer;
    }
}