<?php

namespace App;

/**
 * 文字列をパースするクラス
 */
class StringParser
{
    public function findString(Parser $parser, string $textBuffer, int $textBegin, int $textEnd): array
    {
        $stringNode = StringNode::createStringNode(
            $textBuffer,
            $textBegin,
            $textEnd,
            $parser->shouldDecodeNodes(),
            $parser->shouldRemoveEscapeCharacters()
        );
        return $stringNode->getNode();
    }
}
