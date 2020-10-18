<?php

namespace App\Escape;

class EscapeStringNode
{
    private $stringNode;

    public function __construct(StringNode $stringNode)
    {
        $this->stringNode = $stringNode;
    }

    public function createStringNode(): StringNode
    {
        $string = htmlspecialchars($this->stringNode->toString(), ENT_NOQUOTES);
        return new StringNode($string);
    }
}
