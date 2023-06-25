<?php

declare(strict_types=1);

namespace App\Services;

use ReflectionClass;
use stdClass;

class CarriersHelper
{
    public function getClassesArray(): array
    {
        $files = [];
        $filesDir = glob('../src/Carriers/*.php');

        foreach($filesDir as $filename){
        if(is_file($filename)){

          $file = basename( $filename, '.php'); 
          $fileDefinition = "App\Carriers\\$file";

          if ((new ReflectionClass($fileDefinition))->isAbstract()) continue;
          $files[(new $fileDefinition)->getId()]= $fileDefinition;
      }
    }

    return $files;
  }

  public function getTitlesArray(): array
  {
    $carriers = $this->getClassesArray();

    $result = [];
    foreach ($carriers as $key => $value) {
      $result[$key] = new stdClass;
      $result[$key]->id = $key;
      $result[$key]->title = (new $value)->getTitle();
    }

    return $result;
  }
}