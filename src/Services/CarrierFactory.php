<?php

declare(strict_types=1);

namespace App\Services;

use App\Carriers\GeneralCarrier;
use Exception;

class CarrierFactory
{
  public function __construct(private CarriersHelper $helper) {}

  public function create(int $carrier): GeneralCarrier
  {
    $carriers = $this->helper->getClassesArray();

    if (array_key_exists($carrier, $carriers)) {
      return (new $carriers[$carrier]);
     }

    throw new Exception('The given Carrier is not found!');
  }
}