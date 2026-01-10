<?php
declare(strict_types=1);

namespace App\Service;

class ArticleProvider
{
    public function transformDataForTwig(array $articles): array {
        $transformedArticles = [];
        foreach ($articles as $article) {
            $transformedArticles['articles'][] = [
                'title' => $article->getTitle(),
                'content' => substr($article->getContent(), 0, 30) . '...',
                'link' => 'article/' . $article->getId()
            ];
        }

        return $transformedArticles;
    }
}
