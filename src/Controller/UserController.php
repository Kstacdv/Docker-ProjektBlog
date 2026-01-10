<?php
declare(strict_types=1);

namespace App\Controller;

use App\Formatter\ApiResponseFormatter;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController
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

//            'data' => 'User data',
//            'messages' => 'User messages',
//            'errors' => 'User errors',
//            'statusCode' => 'User status_code',
//            'additionalData' => 'User additionalData',
