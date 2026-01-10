<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Service\ArticleProvider;
use App\Service\AboutMeProvider;
use App\Repository\AboutMeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    public function __construct(
        private ArticleRepository $articleRepository,
        private ArticleProvider $articleProvider,
        private AboutMeRepository $aboutMeRepository,
        private AboutMeProvider $aboutMeProvider
        ) {

    }

    #[Route('/main', name: 'main_page')]
    public function mainPage() : Response {
        $articles = $this->articleRepository->findAll();
        dump($articles);

        return new Response('To będzie strona głowna');
    }

    #[Route('/about-me', name: 'about_me', methods: ['GET'])]
    public function index() : Response {
        $info = $this->aboutMeRepository->findAll();
        $form = $this->createForm(AboutMeInfoType::class);

        $data = [];
        if (count($info) > 0) {
            $data = $this->aboutMeProvider->transformAboutData($info);
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route('/articles', name: 'blog-articles')]
    public function showArticles(): Response {
        $articles = $this->articleRepository->findAll();
        $parameteres = [];
        if ($articles) {
            $parameteres = $this->articleProvider->transformDataForTwig($articles);
        }

        return $this->render('articles/articles.html.twig', $parameteres);
    }
}

