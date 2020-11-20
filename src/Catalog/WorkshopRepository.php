<?php

namespace App\Catalog;

class WorkshopRepository
{
    public function __construct()
    {

    }

    public function keyIterator(): Iterator
    {
        return new Iterator();
    }

    public function getWorkShop(int $id): Workshop
    {
        return new Workshop($id);
    }
}
