<?php

namespace App\Catalog;

class CatalogApp
{
    const NEW_WORKSHOP = 'new_workshop';
    const ALL_WORKSHOPS = 'all_workshops';

    private $workshopManager;
    private $handlers = [];

    public function __construct()
    {
        $this->workshopManager = new WorkshopManager();
        $this->createHandlers();
    }

    public function executeActionAndGetResponse(string $actionName, array $parameters)
    {
        $handler = $this->lookupHandlerBy($actionName);
        return $handler->execute($parameters);
    }

    public function getWorkshopManager(): WorkshopManager
    {
        return $this->workshopManager;
    }

    private function lookupHandlerBy(string $handlerName)
    {
        return $this->handlers[$handlerName];
    }

    private function createHandlers()
    {
        $this->handlers[self::NEW_WORKSHOP] = new NewWorkshopHandler($this);
        $this->handlers[self::ALL_WORKSHOPS] = new AllWorkshopsHandler($this);
    }
}
