<?php

namespace App\Escape;

class StringEscape
{
    private $nodeFactory;

    public function __construct(NodeFactory $nodeFactory)
    {
        $this->nodeFactory = $nodeFactory;
    }

    public function find(string $string): StringNode
    {
        return $this->nodeFactory->createStringNode($string);
    }
}
