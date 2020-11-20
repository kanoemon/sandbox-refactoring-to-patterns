<?php

namespace App\Catalog;

class Iterator
{
    private $items = [1, 2, 3];
    private $index;

    public function hasNext(): bool
    {
        $index = isset($this->index) ? $this->index : 0;
        return isset($this->items[$index + 1]);
    }

    public function next(): int
    {
        if (isset($this->index)) {
            $this->index++;
        } else {
            $this->index = 0;
        }
        return $this->items[$this->index];
    }
}
