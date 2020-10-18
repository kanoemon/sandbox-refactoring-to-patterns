<?php

namespace App\Escape;

class StringNode
{
    private $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    public function toString(): string
    {
        return $this->string;
    }
}