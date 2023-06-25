<?php

declare(strict_types=1);

namespace App\Carriers;

abstract class GeneralCarrier
{
    protected int $id;

    protected string $title;

    public function getId(): int
    { 
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    abstract public function calculatePrice(int $weight): int;
}