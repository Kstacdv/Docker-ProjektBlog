<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/articles', name: 'api_articles')]
class ApiArticleController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll();

        return $this->json($articles, 200, [], ['groups' => 'article:read']);
    }

}
