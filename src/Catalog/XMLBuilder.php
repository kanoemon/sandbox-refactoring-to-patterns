<?php

namespace App\Catalog;

class XMLBuilder
{
    private $tags = [];
    private $root;

    public function __construct(string $tag)
    {
        $this->root = $tag;
    }

    public function addBelowParent(string $tag): void
    {
        $this->tags[] = ['tag' => $tag];
    }

    public function addAttribute(string $key, $value): void
    {
        $keys = array_keys($this->tags);
        $this->tags[end($keys)]['attributes'][$key] = $value;
    }

    public function toString(): string
    {
        $xml = '<' . $this->root . '>';
        foreach ($this->tags as $data) {
            $xml .= '<' . $data['tag'];
            if (isset($data['attributes'])) {
                foreach ($data['attributes'] as $key => $value) {
                    $xml .= ' ';
                    $xml .= $key . '=';
                    $xml .= "'" . $value . "'";
                }
            }
            $xml .= '>';
            $xml .= '</' . $data['tag'] . '>';
        }
        $xml .= '</' . $this->root . '>';
        return $xml;
    }
}
