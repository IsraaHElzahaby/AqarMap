<?php
namespace App\Controller;
use App\Entity\Comment;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use DateTime;
class CommentController extends ApiController
{
    // to list all articles ordered by creation date
    public function index(CommentRepository $commentRepository)
    {

        $articleData = $commentRepository->findArticle();
        return $this->respond($articleData);
    }

    /**
    * @Route("/article/add", methods="POST")
    */
    public function add(Request $request, ArticleRepository $articleRepository, EntityManagerInterface $em)
    {
        // $request = $this->transformJsonBody($request);

        if (! $request) {
            return $this->respondValidationError('Please provide a valid request!');
        }

        $data = json_decode($request->getContent(), true);

        // validate the request data
        if ($data['title'] && $data['description'] && $data['categoryId']) {
            // persist the new article
            $article = new Article;
            $article->setTitle($data['title'] );
            $article->setDescription($data['description']);
            $article->setCategoryId($data['categoryId']);
            $article->setCreationDate(new DateTime('NOW'));
            $em->persist($article);
            $em->flush();

            return $this->respondCreated($articleRepository->get($article));
        }else{
            return $this->respondValidationError('Please fill all required data!');
        }

        
    }
}