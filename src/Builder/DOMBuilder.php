<?php

namespace App\Builder;

class DOMBuilder
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build(): string
    {
        $dom = '';
        foreach($this->data as $prop => $value) {
            $dom .= "<${prop}>";
            $dom .= $value;
            $dom .= "</${prop}>";
        }
        return $dom;
    }
}
