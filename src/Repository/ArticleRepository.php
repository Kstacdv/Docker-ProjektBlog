<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use http\Env\Response;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array|null $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array|null $orderBy = null, int|null $limit = null, int|null $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }


    /**
     * @return Article[] Returns an array of Article objects
     */
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function getLastArticle(): ?Article
    {
        $queryBuilder = $this->createQueryBuilder('article');
        $queryBuilder->orderBy('article.dateAdded', 'DESC');
        $queryBuilder->setMaxResults(1);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

}
