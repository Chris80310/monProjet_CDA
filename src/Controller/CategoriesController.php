<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function index(): Response
    {
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
        ]);
    }
}

class ScatController extends AbstractController
{
    #[Route('/sous-categories', name: 'app_scat')]
    public function index(): Response
    {
        return $this->render('categories/scat.html.twig', [
            'controller_name' => 'ScatController',
        ]);
    }
}
