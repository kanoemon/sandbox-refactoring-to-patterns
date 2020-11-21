<?php

namespace App\HtmlTag;

class Node
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function toHTML(): string
    {
        return $this->text;
    }
}
