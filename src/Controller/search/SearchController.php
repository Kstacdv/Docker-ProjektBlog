<?php
declare(strict_types=1);

namespace App\Controller\search;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class SearchController extends AbstractController
{
    #[Route("/search", name: "article_search")]
    public function search(Request $request, ArticleRepository $articleRepository): \Symfony\Component\HttpFoundation\Response
    {
        $searchTerm = $request->query->get('term');

        $articles = [];
        if (!empty($searchTerm)) {
            $articles = $articleRepository->searchByTitle($searchTerm);
        }
        return $this->render('search/index.html.twig', [
            'articles' => $articles,
            'searchTerm' => $searchTerm,
        ]);
    }
}
