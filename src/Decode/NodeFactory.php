<?php

namespace App\Decode;

class NodeFactory
{
    private $decodeQuote = false;

    private $shouldBrToNl = false;

    public function setShouldDecodeQuote($decodeQuote)
    {
        $this->decodeQuote = $decodeQuote;
    }

    public function setShouldBrToNl($shouldBrToNl)
    {
        $this->shouldBrToNl = $shouldBrToNl;
    }

    public function createStringNode(string $string): StringNode
    {
        if ($this->shouldBrToNl) {
            $decodingStringNode = new BrToNlStringNode(new StringNode($string));
            return $decodingStringNode->createStringNode();
        }

        if ($this->decodeQuote) {
            $decodingStringNode = new DecodingQuoteStringNode(new StringNode($string));
            return $decodingStringNode->createStringNode();
        }
        $decodingStringNode = new DecodingStringNode(new StringNode($string));
        return $decodingStringNode->createStringNode();
    }
}
