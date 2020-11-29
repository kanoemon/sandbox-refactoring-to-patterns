<?php

namespace App\TextExtractor;

class EndTag implements Node
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function accept(NodeVisitor $nodeVisitor): void
    {
        $nodeVisitor->visitEndTag($this);
    }

    public function getTagName(): string
    {
        return $this->name;
    }
}
