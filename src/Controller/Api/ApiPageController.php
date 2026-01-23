<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', name: 'api_')]
class ApiPageController extends AbstractController
{
    #[Route('/about', name: 'about', methods: ['GET'])]
    public function aboutApi(): JsonResponse
    {
        return $this->json([
            'title' => 'O mnie',
            'content' => 'Dane pobrane przez REST API',
            'timestamp' => time(),
        ]);
    }

}
