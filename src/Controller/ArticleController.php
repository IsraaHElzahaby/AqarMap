<?php
namespace App\Controller;
use App\Entity\Article;
use App\Entity\Comment;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use DateTime;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Security;

class ArticleController extends ApiController
{
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    // to list all articles ordered by creation date
    public function index(ArticleRepository $articleRepository)
    {

        $is_authanicated = 0;
        //check auth
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $is_authanicated = 1;
           
        }

        $articles = $articleRepository->getAll();
        return $this->respond(['articles' =>$articles,'is_authanicated'=> $is_authanicated]);
    }

    /**
    * @Route("/article/add", methods="POST")
    */
    public function add(Request $request, ArticleRepository $articleRepository, EntityManagerInterface $em)
    {
        // $securityContext = $this->container->get('security.authorization_checker');
        // if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {

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
        // }else{
        //     return $this->respondUnauthorized('Please Login first');

        // }

        
    }

    // to list all article title and comments 
    public function preview(Request $request, ArticleRepository $articleRepository,CommentRepository $commentRepository)
    {
        if (! $request) {
            return $this->respondValidationError('Please provide a valid request!');
        }

        $article = $articleRepository->findOneById($request->get('articleId'));
        if(!is_null($article)){
            $comments =  $commentRepository->findByArticleField($request->get('articleId'));
            return $this->respond(['article' =>$article,'comments'=>$comments]);

        }else{
            return $this->respondValidationError('article not found');

        }
    }
}