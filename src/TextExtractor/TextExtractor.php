<?php

namespace App\TextExtractor;

class TextExtractor implements NodeVisitor
{
    private $isPreTag = false;
    private $result = '';

    public function extractText(): string
    {
        foreach($this->elements() as $node) {
            $node->accept($this);
        }
        return $this->result;
    }

    public function visitTag(Tag $node)
    {
        $tagName = $node->getTagName();
        if ($tagName === 'pre') {
            $this->isPreTag = true;
        }

    }

    public function visitEndTag(EndTag $node)
    {
        $tagName = $node->getTagName();
        if ($tagName === 'pre') {
            $this->isPreTag = false;
        }
    }

    public function visitLinkTag(LinkTag $node)
    {
        if ($this->isPreTag) {
            $this->result .= $node->getLinkText();
        } else {
            $this->result .= htmlspecialchars($node->getLinkText());
        }
    }

    public function visitStringNode(StringNode $node)
    {
        $this->result .= $node->getText();
    }

    private function elements(): array
    {
        return [
            new Tag('pre'),
            new StringNode('apple'),
            new LinkTag('http://xxx.com', 'example'),
            new EndTag('pre'),
            new LinkTag('http://xxx.com', 'example'),
        ];
    }
}
