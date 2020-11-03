<?php

namespace App\HtmlParser;

class RemovingEscapeCharactersNode implements Node
{
    private $delegate;

    public function __construct(Node $newDelegate)
    {
        $this->delegate = $newDelegate;
    }

    protected function shouldRemoveEscapeCharacters(): bool
    {
        return true;
    }

    public function toPlainTextString(): string
    {
        return str_replace("\n", '', $this->delegate->toPlainTextString());
    }
}
