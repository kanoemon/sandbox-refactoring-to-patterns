<?php

namespace App\Decode;

class DecodingQuoteStringNode
{
    private $stringNode;

    public function __construct(StringNode $stringNode)
    {
        $this->stringNode = $stringNode;
    }

    public function createStringNode(): StringNode
    {
        $string = htmlspecialchars($this->stringNode->toString());
        return new StringNode($string);
    }
}
