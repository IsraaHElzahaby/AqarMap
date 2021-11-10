<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends AbstractController
{
    

        /**
         * @Route("/login", name="login", methods={"POST"})
        */
        public function login(Request $request): Response
        {
           // // $user = $this->getUser();
            return $this->json([
                'user' => $this->getUser() ? $this->getUser()->getId() : null]
            );
            
        }
        
    
}
