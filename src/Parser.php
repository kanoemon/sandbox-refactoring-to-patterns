<?php

namespace App;

/**
 * パースするクラス
 */
class Parser
{
    private $nodeFactory;

    public function parse(string $string): array
    {
        $stringParser = new StringParser();
        $stringNode = $stringParser->findString($this, $string, 1, 1);
        return $stringNode->getNode();
    }

    public function getNodeFactory(): NodeFactory
    {
        return $this->nodeFactory;
    }

    public function setNodeFactory(NodeFactory $factory): void
    {
        $this->nodeFactory = $factory;
    }
}
