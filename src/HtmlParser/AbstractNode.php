<?php

namespace App\HtmlParser;

abstract class AbstractNode implements Node
{
    protected $text;

    protected function __construct(string $text, int $begin, int $end)
    {
        $this->text = $text;
    }

    public function getText(): ?string
    {
        return null;
    }

    public function setText(string $text)
    {

    }
}
