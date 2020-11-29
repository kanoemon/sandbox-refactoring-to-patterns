<?php

namespace App\TextExtractor;

class LinkTag implements Node
{
    private $url;
    private $text;

    public function __construct(string $url, string $text)
    {
        $this->url = $url;
        $this->text = $text;
    }

    public function accept(NodeVisitor $nodeVisitor): void
    {
        $nodeVisitor->visitLinkTag($this);
    }

    public function getLinkText(): string
    {
        return '<a href="' . $this->url . '">' . $this->text . '</a>';
    }
}
