<?php

namespace App\Controller;

use App\Entity\Peinture;
use App\Repository\PeintureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class RealisationController extends AbstractController
{
    #[Route('/realisation', name: 'app_realisation')]
    public function index(PeintureRepository $peintureRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $donnes = $peintureRepository->findAll();

        $peintures = $paginator->paginate(
            $donnes,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('realisation/realisation.html.twig', [
            'peintures' => $peintures
        ]);
    }

    #[Route('/realisation/{slug}', name: 'app_realisation_details')]
    public function details(Peinture $peinture): Response
    {
        
        return $this->render('realisation/details.html.twig', [
            'peinture' => $peinture
        ]);
    }
}
