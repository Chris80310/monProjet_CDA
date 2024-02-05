<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CatRepository;
use App\Repository\ScatRepository;
use Symfony\Component\HttpFoundation\Request;

// catégories :

class CategoriesController extends AbstractController

{
    private $categories;      
    private $s_categories; 

    public function __construct(CatRepository $cats, ScatRepository $scats)
    {
        $this->categories = $cats;
        $this->s_categories = $scats;

    }

    #[Route('/categories', name: 'app_cat')]
    public function index(): Response
    {
        $cats = $this->categories->findAll();
        $scats = $this->s_categories->findAll();

        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'categories' => $cats,
            'scats' => $scats,
        ]);
    }

    #[Route('/sous-categories', name: 'app_scat')]
    public function app_scat(Request $request): Response
    {
        $categorie_id = $request->query->get('id');
        $scats = $this->s_categories->findBy(['cat' => $categorie_id]);

        return $this->render('categories/scat.html.twig', [
            'controller_name' => 'CategoriesController',
            'scats' => $scats,
        ]);
    }
}
