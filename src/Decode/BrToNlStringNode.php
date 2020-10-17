<?php

namespace App\Decode;

class BrToNlStringNode
{
    private $stringNode;

    public function __construct(StringNode $stringNode)
    {
        $this->stringNode = $stringNode;
    }

    public function createStringNode(): StringNode
    {
        $string = str_replace('<br>', '\n', $this->stringNode->toString());
        return new StringNode($string);
    }
}
