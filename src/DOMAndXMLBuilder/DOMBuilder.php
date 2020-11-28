<?php

namespace App\DOMAndXMLBuilder;

class DOMBuilder extends AbstractBuilder
{
    private $current;

    public function __construct()
    {
        $this->current = new ElementAdapter(new Element());
    }

    public function addAttribute(string $name, string $value)
    {
        $this->current->addAttribute($name, $value);
    }

    public function toDOM(): string
    {
        return $this->current->getElement()->toString();
    }
}
