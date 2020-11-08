<?php

namespace App\Shopping;

class TagNode
{
    private $name;
    private $value = '';
    private $attributes = '';
    private $children = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addAttribute(string $attribute, string $value): void
    {
        $this->attributes .= ' ';
        $this->attributes .= $attribute;
        $this->attributes .= "='";
        $this->attributes .= $value;
        $this->attributes .= "'";
    }

    public function addValue($value): void
    {
        $this->value = $value;
    }

    public function add(TagNode $tagNode): void
    {
        $this->children[] = $tagNode;
    }

    public function toString(): string
    {
        $result = "<{$this->name}{$this->attributes}>";
        foreach($this->children as $node) {
            $result .= $node->toString();
        }
        $result .= "{$this->value}</{$this->name}>";
        return $result;
        return "<{$this->name}{$this->attributes}>{$this->value}</{$this->name}>";
    }
}
