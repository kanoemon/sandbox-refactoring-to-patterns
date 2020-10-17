<?php

namespace App;

/**
 * 文字列をパースするクラス
 */
class StringParser
{
    public function findString(Parser $parser, string $textBuffer, int $textBegin, int $textEnd): StringNode
    {
        return $parser->getNodeFactory()->createStringNode(
            $textBuffer,
            $textBegin,
            $textEnd
        );
    }
}
