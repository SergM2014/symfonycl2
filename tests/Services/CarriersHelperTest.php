<?php

namespace App\Tests\Services;

use App\Services\CarriersHelper;
use PHPUnit\Framework\TestCase;

class CarriersHelperTest extends TestCase
{
    private $helper;

    protected function setUp(): void
    {
        $this->helper = new CarriersHelper;
    }

    public function testGetClassesArray(): void
    {
        $this->assertIsArray($this->helper->getClassesArray());
    }

    public function testGetTitlesArray(): void
    {
        $this->assertIsArray($this->helper->getTitlesArray());
    }

    protected function tearDown(): void
    {
        $this->helper = null;
    }
}
