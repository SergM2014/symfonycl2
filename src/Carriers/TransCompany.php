<?php 

declare(strict_types=1);

namespace App\Carriers;

class TransCompany extends GeneralCarrier
{
   public function __construct()
   {
        $this->id = 1;
        $this->title = 'Transcompany';
   }

    public function calculatePrice(int $weight): int
    {
        if ($weight > 10) return 100;

        return 20;
    }
}