<?php
declare(strict_types=1);

namespace App\Controller;

use App\Formatter\ApiResponseFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('api/users/show', name: 'app_user', methods: ['GET'])]
    public function showUser(ApiResponseFormatter $formatter): JsonResponse {
        $currentUser = $this->getUser();

        return $formatter->withData([
                'user_id' => $currentUser->getId(),
                'user_email' => $currentUser->getEmail(),
        ])->format();
    }
}
