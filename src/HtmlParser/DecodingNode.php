<?php

namespace App\HtmlParser;

class DecodingNode implements Node
{
    private $delegate;

    public function __construct(Node $newDelegate)
    {
        $this->delegate = $newDelegate;
    }

    protected function shouldDecode(): bool
    {
        return true;
    }

    public function toPlainTextString(): string
    {
        return Translate::decode($this->delegate->toPlainTextString());
    }

    public function accept(NodeVisitor $visitor): void
    {
        $this->delegate->accept($visitor);
    }

    public function collectInto(NodeList $collectionList, $nodeType): void
    {
        $this->delegate->collectInto($collectionList, $nodeType);
    }
}
