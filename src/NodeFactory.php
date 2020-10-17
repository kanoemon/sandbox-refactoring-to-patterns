<?php

namespace App;

class NodeFactory
{
    /**
     * @var bool
     */
    private $decodeStringNodes = false;

    private $removeEscapeCharacters = false;

    public function setDecodeStringNodes(bool $decodeStringNodes): void
    {
        $this->decodeStringNodes = $decodeStringNodes;
    }

    public function shouldDecodeStringNodes(): bool
    {
        return $this->decodeStringNodes;
    }

    public function setRemoveEscapeCharacters(bool $removeEscapeCharacters): void
    {
        $this->removeEscapeCharacters = $removeEscapeCharacters;
    }

    public function shouldRemoveEscapeCharacters(): bool
    {
        return $this->removeEscapeCharacters;
    }

    public function createStringNode(string $textBuffer, int $textBegin, int $textEnd): StringNode
    {
        return new StringNode(
            $textBuffer, 
            $textBegin, 
            $textEnd, 
            $this->shouldDecodeStringNodes(), 
            $this->shouldRemoveEscapeCharacters()
        );
    }
}
