<?php

namespace App\Tag;

// p.249
class TagNode
{
    private $name;
    private $value = '';
    private $attributes = '';
    private $children = [];
    private $parent;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function add(TagNode $child): void
    {
        $child->setParent($this);
        $this->children[] = $child;
    }

    public function addAttribute(string $attribute, string $value): void
    {
        $this->attributes .= ' ';
        $this->attributes .= $attribute;
        $this->attributes .= "='";
        $this->attributes .= $value;
        $this->attributes .= "'";
    }

    public function addValue(string $value): void
    {
        $this->value = $value;
    }

    public function setParent(TagNode $parent)
    {
        $this->parent = $parent;
    }

    public function getParent(): ?TagNode
    {
        return $this->parent;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toString(): string
    {
        $result = '';
        $result .= "<{$this->name}{$this->attributes}>";
        foreach($this->children as $child) {
            $result .= $child->toString();
        }
        $result .= $this->value;
        $result .= "</{$this->name}>";
        return $result;
    }
}
