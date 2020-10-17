<?php

namespace App;

class StringNode
{
    public static function createStringNode($textBuffer, int $textBegin, int $textEnd, bool $shouldDecode, bool $shouldRemoveEscapeCharacters): StringNode
    {
        return new StringNode();
    }
}