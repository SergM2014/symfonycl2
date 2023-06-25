<?php

namespace App\Tests\Controller;

use App\Services\CarriersHelper;
use App\Carriers\GeneralCarrier;
use App\Controller\CarrierController;
use App\Services\CarrierFactory;
use PHPUnit\Framework\TestCase;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CarrierControllerTest extends TestCase
{
    public function testCalculatePrice(): void
    {
        $mockedCarrier = $this->createMock(GeneralCarrier::class);
        $mockedCarrier->expects($this->once())
            ->method('calculatePrice')
            ->willReturn(11);

        $mockedFactory = $this->createMock(CarrierFactory::class);
        $mockedFactory->expects($this->once())
            ->method('create')
            ->with(1)
            ->willReturn($mockedCarrier);

        $mockedRequest = $this->createMock(Request::class);
        $mockedRequest->expects($this->once())
            ->method('getContent')
            ->willReturn('{"weight":"", "carrier":1}');

        $mockedController = $this->createPartialMock(CarrierController::class,['json']);
        $mockedController->expects($this->once())
            ->method('json')
            ->willReturn(new JsonResponse());

        $result = $mockedController->calculatePrice($mockedRequest, $mockedFactory);

        $this->assertInstanceOf(JsonResponse::class, $result);
    }

    public function testIndex(): void
    {
        $mockedHelper = $this->createMock(CarriersHelper::class);
        $mockedHelper->expects($this->once())
            ->method('getTitlesArray')
            ->willReturn([
            2 => 'PackGroup',
            1 => 'TransCompany'
          ]);

        $mockedInertia = $this->createMock(InertiaInterface::class);
        $mockedInertia->expects($this->once())
            ->method('render')
            ->willReturn(new Response());
        
        $result = (new CarrierController)->index($mockedInertia, $mockedHelper);
        
        $this->assertInstanceOf(Response::class, $result);
    }    
}
