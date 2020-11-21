<?php

namespace App\HtmlTag;

abstract class CompositeTag extends Tag
{
    protected $children = ['link'];

    public function toHTML(): string
    {
        $htmlContents = '';
        $this->putStartTagInto($htmlContents);
        $this->putChildrenTagInto($htmlContents);
        $this->putEndTagInto($htmlContents);
        return $htmlContents;
    }

    private function putStartTagInto(string &$string)
    {
        $string .= '<' . $this->getTagName();
        foreach($this->keys() as $key => $value) {
            $string .= ' ' . $key . '="' . $value . '"';
        }
        $string .= '>';
    }

    private function putChildrenTagInto(string &$string)
    {
        foreach($this->children() as $node) {
            $string .= $node->toHTML();
        }
    }

    private function putEndTagInto(string &$string)
    {
        $string .= '</' . $this->getTagName() . '>';
    }

    abstract protected function getTagName(): string;

    public function children()
    {
        return [
            new Node('link'),
        ];
        return $this->children;
    }
}
