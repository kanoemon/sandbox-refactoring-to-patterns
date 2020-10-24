<?php

namespace App\Builder;

class JsonBuilder
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build(): string
    {
        return json_encode($this->data);
    }
}
