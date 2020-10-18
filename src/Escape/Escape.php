<?php

namespace App\Escape;

class Escape
{
    private $nodeFactory;

    public function __construct(NodeFactory $nodeFactory)
    {
        $this->nodeFactory = $nodeFactory;
    }

    public function escape(string $string): string
    {
        $stringEscape = new StringEscape($this->nodeFactory);
        $stringNode = $stringEscape->find($string);
        return $stringNode->toString();
    }
}
