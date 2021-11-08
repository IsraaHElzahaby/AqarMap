<?php
namespace App\Controller;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class ArticleController extends ApiController
{
    
    public function index(ArticleRepository $articleRepository)
    {

        $blogs = $articleRepository->getAll();
        return $this->respond($blogs);
    }
}