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
}
