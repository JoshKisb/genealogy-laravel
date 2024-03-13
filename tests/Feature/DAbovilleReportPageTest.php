<?php

/**
 * Feature tests for the DAbovilleReportPage class.
 * 
 * This class tests the functionalities of the DAbovilleReportPage, ensuring that
 * the render method behaves as expected under various scenarios.
 */

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Filament\Pages\DAbovilleReportPage;

class DAbovilleReportPageTest extends TestCase
{
    public function testRenderMethodReturnsCorrectView()
    {
        $page = new DAbovilleReportPage();
        $view = $page->render();

        $this->assertViewIs('livewire.daboville-report', $view);
    }

    public function testRenderMethodReturnsRenderableInstance()
    {
        $page = new DAbovilleReportPage();
        $renderable = $page->render();

        $this->assertInstanceOf(\Illuminate\Contracts\Support\Renderable::class, $renderable);
    }
}
