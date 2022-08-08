<?php

namespace App\Controller;

use App\Repository\BlogpostRepository;
use App\Repository\PeintureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(PeintureRepository $peintureRepository , BlogpostRepository $blogpostRepository): Response
    {
        return $this->render('home/home.html.twig', [
            'peintures' => $peintureRepository->lasttree(),
            'blogposts' =>  $blogpostRepository->lasttree()
        ]);
    }

   

   
}
