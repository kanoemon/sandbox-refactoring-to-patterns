<?php

namespace App\Builder;

class JsonPresenter extends AbstractPresenter
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    protected function createBuilder(): JsonBuilder
    {
        return new JsonBuilder($this->data);
    }
}
