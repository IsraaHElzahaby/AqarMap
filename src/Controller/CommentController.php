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
    

    /**
    * @Route("/article/comment/add/{articleId}", methods="POST")
    */
    public function add(Request $request, CommentRepository $commentRepository, EntityManagerInterface $em)
    {

        if (! $request) {
            return $this->respondValidationError('Please provide a valid request!');
        }

        $data = json_decode($request->getContent(), true);

        // validate the request data
        if ($data['comment'] && $data['articleId']) {
            // persist the new comment
            $comment = new Comment;
            $comment->setComment($data['comment'] );
            $comment->setArticle($data['articleId'] );
            $comment->setCreationDate(new DateTime('NOW'));
            $em->persist($comment);
            $em->flush();

            return $this->respondCreated($comment);
        }else{
            return $this->respondValidationError('Please fill all required data!');
        }

        
    }
}