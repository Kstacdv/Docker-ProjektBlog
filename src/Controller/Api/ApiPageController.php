<?php

namespace App\Controller\Api;

use App\Formatter\ApiResponseFormatter;
use App\Repository\AboutMeRepository;
use App\Service\AboutMeProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', name: 'api_')]
class ApiPageController extends AbstractController
{
    public function __construct(
        private AboutMeRepository $aboutMeRepository,
        private AboutMeProvider   $aboutMeProvider,
        private ApiResponseFormatter $apiResponseFormatter
    )
    {

    }

    #[Route('/about-me', name: 'about_me', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $info = $this->aboutMeRepository->findAll();

        $data = [];
        if (count($info) > 0) {
            $data = $this->aboutMeProvider->transformAboutData($info);
        }

        return $this->apiResponseFormatter
            ->withData($data)
            ->format();
    }
}
