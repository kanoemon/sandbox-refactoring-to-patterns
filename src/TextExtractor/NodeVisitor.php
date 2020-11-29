<?php

namespace App\TextExtractor;

interface NodeVisitor
{
    public function visitTag(Tag $node);
    public function visitEndTag(EndTag $node);
    public function visitLinkTag(LinkTag $node);
    public function visitStringNode(StringNode $node);
}
