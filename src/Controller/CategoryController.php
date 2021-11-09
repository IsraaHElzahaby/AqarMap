<?php
namespace App\Controller;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class CategoryController extends ApiController
{
    // to list all categories
    public function index(CategoryRepository $categoryRepository)
    {

        $categories = $categoryRepository->getAll();
        return $this->respond($categories);
    }

    
}