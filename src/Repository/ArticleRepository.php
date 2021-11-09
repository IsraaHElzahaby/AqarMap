<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    

    public function get(Article $article)
    {
        return [
                'id'    => (int) $article->getId(),
                'title' => (string) $article->getTitle(),
                'description' => (string) $article->getDescription(),
                'category_id' => (string) $article->getCategoryId(),
                'creation_date' => $article->getCreationDate(),
                
        ];
    }

    public function getAll()
    {
        $articles = $this->findAll();
        $articlesList = [];

        foreach ($articles as $article) {
            $articlesList[] = $this->get($article);
        }

        return $articlesList;
    }

    public function findOneById($value)
    {
        return $this->createQueryBuilder('a')
            ->select('a.title')
            ->andWhere('a.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()

        ;
    }
    
   
}
