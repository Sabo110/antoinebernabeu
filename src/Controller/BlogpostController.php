<?php

namespace App\Controller;

use App\Entity\Blogpost;
use App\Repository\BlogpostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogpostController extends AbstractController
{
    #[Route('/blogpost', name: 'app_blogpost')]
    public function index(BlogpostRepository $blogpostRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $donnes = $blogpostRepository->findBy([],['id' => 'DESC']);
        $blogposts = $paginator->paginate(
            $donnes,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('blogpost/blogposts.html.twig', [
            'blogposts' => $blogposts,
        ]);
    }

    #[Route('/blogpost/{slug}', name: 'app_blogpost_details')]
    public function details(Blogpost $blogpost): Response
    {
        return $this->render('blogpost/details.html.twig', [
            'blogpost' => $blogpost,
        ]);
    }
}
