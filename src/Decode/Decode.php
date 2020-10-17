<?php

namespace App\Decode;

class Decode
{
    private $nodeFactory;

    public function __construct(NodeFactory $nodeFactory)
    {
        $this->nodeFactory = $nodeFactory;
    }

    public function decode(string $string): string
    {
        $stringDecorder = new StringDecoder($this->nodeFactory);
        $stringNode = $stringDecorder->find($string);
        return $stringNode->toString();
    }
}
