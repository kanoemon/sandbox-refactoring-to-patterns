<?php

namespace App\TextExtractor;

class StringNode implements Node
{
    private $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    public function accept(NodeVisitor $nodeVisitor): void
    {
        $nodeVisitor->visitStringNode($this);
    }

    public function getText(): string
    {
        return $this->string;
    }
}
