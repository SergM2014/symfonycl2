<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\TextProzessor;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Task2Controller extends AbstractController
{
    #[Route('/task21')]
    public function task21(InertiaInterface $inertia): Response
    {  
        return $inertia->render('Task21');
    }

    #[Route('/task22')]
    public function task22(InertiaInterface $inertia): Response
    {  
        return $inertia->render('Task22');
    }

    #[Route('/prozessTask21', methods: ['POST'])]
    public function prozess(Request $request, TextProzessor $textProzessor): Response
    {  
        $postData = json_decode($request->getContent(), true);

        $result = $textProzessor->parseTags($postData['text']);

        $response = ['success' => true, 'response' => $result];

        return $this->json($response);
    }

    #[Route('/prozessTask22', methods: ['POST'])]
    public function prozessTest( TextProzessor $textProzessor): Response
    {  
        $text = 'Lorem Ipsum is simply one: dummy text of the printing and two: typesetting industry. Lorem Ipsum has been the industry\'s one: standard dummy text ever since the three: 1500s.';

        $result = $textProzessor->parseKeys($text);

        $response = ['success' => true, 'response' => $result];

        return $this->json($response);
    }

    
}