<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\CarrierFactory;
use App\Services\CarriersHelper;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarrierController extends AbstractController
{
    #[Route('/')]
    public function index(InertiaInterface $inertia, CarriersHelper $helper): Response
    {
        $carriers = $helper->getTitlesArray();
       
        return $inertia->render('Task1', [
            'carriers' =>  $carriers
        ]);
    }

    #[Route('/calculate', methods: ['POST'])]
    public function calculatePrice(Request $request, CarrierFactory $factory): Response
    {
        $postData = json_decode($request->getContent(), true);

        $res = $factory->create((int)$postData['carrier'])
                       ->calculatePrice((int)$postData['weight']);
        $response = ['success' => true, 'response' => $res];

        return $this->json($response);
    }
}