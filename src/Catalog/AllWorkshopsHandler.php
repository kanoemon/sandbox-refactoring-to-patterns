<?php

namespace App\Catalog;

class AllWorkshopsHandler extends Handler
{
    const ALL_WORKSHOPS_STYLESHEET = 'all_workshops_stylesheet';

    public function execute(array $parameters)
    {
        return new HandlerResponse(
            $this->prettyPrint($this->allWorkshopsData()),
            self::ALL_WORKSHOPS_STYLESHEET
        );
    }

    private function allWorkshopsData(): string
    {
        $allWorkshopsXml = new XmlBuilder('workshops');
        $repository = $this->workshopManager()->getWorkshopRepository();
        $ids = $repository->keyIterator();
        while($ids->hasNext()) {
            $id = $ids->next();
            $workShop = $repository->getWorkShop($id);
            $allWorkshopsXml->addBelowParent('workshop'); 
            $allWorkshopsXml->addAttribute('id', $workShop->getID());
        }
        return $allWorkshopsXml->toString();
    }

    private function prettyPrint(string $string): string
    {
        return $string;
    }
}
