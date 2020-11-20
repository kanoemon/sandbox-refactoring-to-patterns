<?php

namespace App\Catalog;

class HandlerResponse
{
    private $data;

    public function __construct($data, $action)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
