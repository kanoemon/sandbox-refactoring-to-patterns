<?php

namespace App\HtmlParser;

class NodeReader
{
    private $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function getParser(): Parser
    {
        return $this->parser;
    }
}
