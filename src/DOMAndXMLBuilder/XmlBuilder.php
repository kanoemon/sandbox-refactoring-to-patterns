<?php

namespace App\DOMAndXMLBuilder;

class XmlBuilder extends AbstractBuilder
{
    private $currentNode;

    public function __construct()
    {
        $this->currentNode = new TagNode();
    }

    public function addAttribute(string $name, string $value)
    {
        $this->currentNode->addAttribute($name, $value);
    }

    public function toDOM(): string
    {
        return $this->currentNode->toString();
    }
}
