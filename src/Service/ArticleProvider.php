<?php
declare(strict_types=1);

namespace App\Service;

class ArticleProvider
{
    public function transformDataForTwig(array $articles): array
    {
        $transformedArticles = [];
        foreach ($articles as $article) {
            $content = $article->getArticleBody() ?? '';

            $transformedArticles['articles'][] = [
                'id' => $article->getId(),
                'title' => $article->getTitle(),
                'content' => substr($content, 0, 100) . '...',
                'author' => $article->getAuthor() ? $article->getAuthor()->getEmail() : 'Anonim',
                'date' => $article->getCreatedAt() ? $article->getCreatedAt()->format('Y-m-d') : null,
                'link' => '/api/articles/' . $article->getId()
            ];
        }

        return $transformedArticles;
    }
}
