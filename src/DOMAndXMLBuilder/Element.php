<?php

namespace App\DOMAndXMLBuilder;

class Element
{
    private $name;
    private $value;

    public function setAttribute(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function toString(): string
    {
        return "<{$this->name}>{$this->value}</{$this->name}>";
    }
}
