<?php

namespace App\Builder;

class DOMPresenter extends AbstractPresenter
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    protected function createBuilder(): DOMBuilder
    {
        return new DOMBuilder($this->data);
    }
}
