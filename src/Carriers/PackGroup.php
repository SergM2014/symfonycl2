<?php 

declare(strict_types=1);

namespace App\Carriers;

class PackGroup extends GeneralCarrier
{
   public function __construct()
   {
        $this->id = 2;
        $this->title = 'PackGroup';
   }

    public function calculatePrice(int $weight): int
    {
        return (int)$weight * 1;
    }
}