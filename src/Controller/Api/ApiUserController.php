<?php

namespace App\Controller\Api;

use App\Formatter\ApiResponseFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/users', name: 'api_user_')]
class ApiUserController extends AbstractController
{
    public function __construct(
        private ApiResponseFormatter $apiResponseFormatter
    ) {}

    #[Route('/show', name: 'show', methods: ['GET'])]
    public function showUser(): JsonResponse
    {
        $currentUser = $this->getUser();
        if (!$currentUser) {
            return $this->apiResponseFormatter
                ->withData(null)
                ->format();
        }
        $userData = [
            'user_id' => $currentUser->getId(),
            'user_email' => $currentUser->getUserIdentifier(),
        ];

        return $this->apiResponseFormatter
            ->withData($userData)
            ->format();
    }
}
