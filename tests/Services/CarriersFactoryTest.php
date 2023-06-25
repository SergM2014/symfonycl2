<?php

namespace App\Tests\Services;

use App\Carriers\GeneralCarrier;
use App\Services\CarrierFactory;
use App\Services\CarriersHelper;
use PHPUnit\Framework\TestCase;

class CarriersFactoryTest extends TestCase
{
  private $mockedHelper;

  protected function setUp(): void
  {
    $this->mockedHelper = $this->createMock(CarriersHelper::class);
    $this->mockedHelper->expects($this->once())
        ->method('getClassesArray')
        ->willReturn([
        2 => 'App\Carriers\PackGroup',
        1 => 'App\Carriers\TransCompany'
      ]);
  }

  public function testCreate(): void
  {
    $factory = new CarrierFactory($this->mockedHelper);
    $res = $factory->create(2);
    $this->assertIsObject($res );
  }

  public function testCreateFailed(): void
  {
    $this->expectException(\Exception::class);
    $factory = new CarrierFactory($this->mockedHelper);
    $factory->create(0);
  }

  protected function tearDown(): void
  {
    $this->mockedHelper = null;
  }
}