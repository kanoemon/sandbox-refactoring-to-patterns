<?php

namespace App\Escape;

class NodeFactory
{
    private $escapeQuote = false;

    private $shouldBrToNl = false;

    public function setShouldEscapeQuote($escapeQuote)
    {
        $this->escapeQuote = $escapeQuote;
    }

    public function setShouldBrToNl($shouldBrToNl)
    {
        $this->shouldBrToNl = $shouldBrToNl;
    }

    public function createStringNode(string $string): StringNode
    {
        if ($this->shouldBrToNl) {
            $stringNode = new BrToNlStringNode(new StringNode($string));
            return $stringNode->createStringNode();
        }

        if ($this->escapeQuote) {
            $stringNode = new EscapeQuoteStringNode(new StringNode($string));
            return $stringNode->createStringNode();
        }
        $stringNode = new EscapeStringNode(new StringNode($string));
        return $stringNode->createStringNode();
    }
}
