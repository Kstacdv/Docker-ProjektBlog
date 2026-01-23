<?php

namespace App\Controller\Api;

use App\Repository\ArticleRepository;
use App\Service\ArticleProvider;
use App\Formatter\ApiResponseFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/articles', name: 'api_articles_')]
class ApiArticleController extends AbstractController
{
    public function __construct(
        private ArticleRepository $articleRepository,
        private ArticleProvider $articleProvider,
        private ApiResponseFormatter $apiResponseFormatter
    ) {}

    #[Route('', name: 'list', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $articles = $this->articleRepository->findAll();
        $data = [];

        if ($articles) {
            $data = $this->articleProvider->transformDataForTwig($articles);
        }

        return $this->apiResponseFormatter
            ->withData($data)
            ->format();
    }

    #[Route('/latest', name: 'latest', methods: ['GET'])]
    public function latest(): JsonResponse
    {
        $article = $this->articleRepository->getLastArticle();
        $data = [];

        if ($article) {
            $data = $this->articleProvider->transformDataForTwig([$article]);
        }

        return $this->apiResponseFormatter
            ->withData($data)
            ->format();
    }
}
