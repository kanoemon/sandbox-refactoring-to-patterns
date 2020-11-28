<?php

namespace App\DOMAndXMLBuilder;

class TagNode implements XMLNode
{
    private $name;
    private $value;

    public function addAttribute(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function toString(): string
    {
        return "<{$this->name}>{$this->value}</{$this->name}>";
    }
}
