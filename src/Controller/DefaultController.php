<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Message\Message;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(MessageBusInterface $bus)
    {
        $bus->dispatch(new Message('Look! I created a message!'));
        // return $this->render('default/index.html.twig', [
        //     'controller_name' => 'DefaultController',
        // ]);
        return new Response('message is sent');
    }
}
