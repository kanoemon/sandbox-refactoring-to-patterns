<?php

namespace App\HtmlParser;

class StringNode extends AbstractNode
{
    public static function createStringNode(string $text, int $begin, int $end, bool $shouldDecode, bool $shouldRemoveEscapeCharacters): Node
    {
        if ($shouldDecode) {
            return new DecodingNode(new StringNode($text, $begin, $end));
        }
        if ($shouldRemoveEscapeCharacters) {
            return new RemovingEscapeCharactersNode(new StringNode($text, $begin, $end));
        }
        return new StringNode($text, $begin, $end);
    }

    public function toPlainTextString(): string
    {
        return $this->text;
    }
}
