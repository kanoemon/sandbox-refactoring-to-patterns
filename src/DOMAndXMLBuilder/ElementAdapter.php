<?php

namespace App\DOMAndXMLBuilder;

class ElementAdapter implements XMLNode
{
    private $element;

    public function __construct(Element $element)
    {
        $this->element = $element;
    }

    public function getElement(): Element
    {
        return $this->element;
    }

    public function addAttribute(string $name, string $value)
    {
        $this->element->setAttribute($name, $value);
    }
}
