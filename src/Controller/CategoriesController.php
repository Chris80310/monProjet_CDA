<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CatRepository;
use App\Repository\ScatRepository;


// catégories :

class CategoriesController extends AbstractController

{
    private $categories;      

    public function __construct(CatRepository $cats)
    {
        $this->categories = $cats;
    }

    #[Route('/categories', name: 'app_cat')]
    public function index(): Response
    {
        $cats = $this->categories->findAll();

        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'categories' => $cats,
        ]);
    }
}

// sous-catégories :

class ScatController extends AbstractController
{  
    private $s_categories; 

    public function __construct(ScatRepository $scats)
    {
        $this->s_categories = $scats;
    }
    
    #[Route('/sous-categories', name: 'app_scat')]
    public function index(): Response
    {
        $scats = $this->s_categories->findAll();

        return $this->render('categories/scat.html.twig', [
            'controller_name' => 'ScatController',
            'sous-categories' => $scats,
        ]);
    }
}
