<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Catalog\CatalogApp;

class CatalogTest extends TestCase
{
    public function testActionNewWorkshop()
    {
        $catalogApp = new CatalogApp();
        $response = $catalogApp->executeActionAndGetResponse(CatalogApp::NEW_WORKSHOP, []);
        $this->assertSame($response->getData(), "<workshops><workshop id='1'></workshop><workshop id='2'></workshop><workshop id='3'></workshop></workshops>");
    }
}
