<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Service\ArticleProvider;
use App\Service\AboutMeProvider;
use App\Repository\AboutMeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    public function __construct(
        private ArticleRepository $articleRepository,
        private ArticleProvider $articleProvider,
        ) {

    }
    #[Route('/main', name: 'main_page')]
    public function index(): Response {
        $parameters = [
            'articles' => $this->articleRepository->getLastArticle()
        ];

        return $this->render('main_page/index.html.twig', $parameters);
    }

    #[Route('/articles', name: 'blog-articles')]
    public function showArticles(Request $request): Response {
        $tag = $request->query->get('tag');

        if ($tag) {
            $articles = $this->articleRepository->findByTag($tag);
        } else {
            $articles = $this->articleRepository->findAll();
        }

        $transformedData = $this->articleProvider->transformDataForTwig($articles);

        return $this->render('article/index.html.twig', [
            'articles_list' => $transformedData['articles'] ?? [],
            'current_tag' => $tag
        ]);
    }
}

