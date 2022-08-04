<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\PeintureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'app_portfolio')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('portfolio/portfolio.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }

    #[Route('/portfolio/{slug}', name: 'app_portfolio_categorie')]
    public function portfolio( Categorie $categorie, PeintureRepository $peintureRepository): Response
    {
      
        return $this->render('portfolio/categorie.html.twig', [
            'peintures' => $peintureRepository->getpeintureportfolio($categorie),
            'categorie' => $categorie

        ]);
    }
}
