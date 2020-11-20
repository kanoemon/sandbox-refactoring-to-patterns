<?php

namespace App\Catalog;

class NewWorkshopHandler extends Handler
{
    public function execute(array $parameters)
    {
        $this->createNewWorkshop($parameters);
        return $this->catalogApp->executeActionAndGetResponse(CatalogApp::ALL_WORKSHOPS, $parameters);
    }

    private function createNewWorkshop(array &$parameters)
    {
        $nextWorkshopId = $this->workshopManager()->getNextWorkshopID();
        $this->workshopManager()->addWorkshop($this->newWorkshopContents($nextWorkshopId));
        $parameters['id'] = $nextWorkshopId;
    }

    private function newWorkshopContents($nextWorkshopId)
    {
        return $this->workshopManager()->createNewFileFromTemplate(
            $nextWorkshopId,
            $this->workshopManager()->getWorkshopDir(),
            $this->workshopManager()->getWorkshopTemplate()
        );
    }
}
