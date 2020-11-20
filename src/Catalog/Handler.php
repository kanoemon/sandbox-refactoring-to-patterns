<?php

namespace App\Catalog;

abstract class Handler
{
    protected $catalogApp;

    public function __construct(CatalogApp $catalogApp)
    {
        $this->catalogApp = $catalogApp;
    }

    abstract public function execute(array $parameters);

    protected function workshopManager(): workshopManager
    {
        return $this->catalogApp->getWorkshopManager();
    }
}
