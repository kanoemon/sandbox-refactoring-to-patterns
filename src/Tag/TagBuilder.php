<?php

namespace App\Tag;

class TagBuilder
{
    private $rootNode;
    private $currentNode;

    public function __construct(string $rootTagName)
    {
        $this->rootNode = new TagNode($rootTagName);
        $this->currentNode = $this->rootNode;
    }

    public function addChild(string $childTagName)
    {
        $this->addTo($this->currentNode, $childTagName);
    }

    public function addSibling(string $siblingName)
    {
        $this->addTo($this->currentNode->getParent(), $siblingName);
    }

    private function addTo(TagNode $parentNode, string $tagName)
    {
        $this->currentNode = new TagNode($tagName);
        $parentNode->add($this->currentNode);

    }

    public function addToParent(string $parentTagName, string $childTagName)
    {
        $parentNode = $this->findParentBy($parentTagName);
        if (!isset($parentNode)) {
            throw new \RuntimeException('missing parent tag:' . $parentTagName);
        }
        $this->addTo($parentNode, $childTagName);
    }

    private function findParentBy(string $parentName): ?TagNode
    {
        $parentNode = $this->currentNode;
        while($parentNode !== null) {
            if($parentName === $parentNode->getName()) {
                return $parentNode;
            }
            $parentNode = $parentNode->getParent();
        }
        return null;
    }

    public function addAttribute(string $name, string $value): void
    {
        $this->currentNode->addAttribute($name, $value);
    }

    public function addValue(string $value): void
    {
        $this->currentNode->addValue($value);
    }

    public function toXml(): string
    {
        return $this->rootNode->toString();
    }
}
