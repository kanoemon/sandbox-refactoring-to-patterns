<?php

namespace App\HtmlParser;

class StringParser
{
    public function find(NodeReader $reader, string $input, int $position, bool $baranceQuotes): Node
    {
        $textBuffer = $input;
        $textBegin = 0;
        $textEnd = 0;
        return StringNode::createStringNode($textBuffer, $textBegin, $textEnd, $reader->getParser()->shouldDecodeNodes(), $reader->getParser()->shouldRemoveEscapeCharacters());
    }
}
