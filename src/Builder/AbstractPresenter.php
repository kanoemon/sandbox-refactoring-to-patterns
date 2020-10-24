<?php

namespace App\Builder;

abstract class AbstractPresenter
{
    protected $data;

    abstract protected function createBuilder();

    public function markup()
    {
        return $this->createBuilder()->build();
    }

    public function addBelow(array $data): void
    {
        foreach($data as $prop => $value) {
            $this->data[$prop] = $value;
        }
    }
}
