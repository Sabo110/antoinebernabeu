<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home/home.html.twig', [
            
        ]);
    }

    #[Route('/connexion', name: 'app_login', methods:['GET', 'POST'])]
    public function login(): Response
    {
        return $this->render('home/login.html.twig', [
            
        ]);
    }

   
}