<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// class ReactController extends AbstractController
// {
//     #[Route('/react', name: 'app_react')]
//     public function index(): Response
//     {
//         return $this->render('react/index.html.twig', [
//             'controller_name' => 'ReactController',
//         ]);
//     }
// }

class ReactCatController extends AbstractController
{
    #[Route('/react/cat', name: 'app_react_cat')]
    public function index(): Response
    {
        return $this->render('react/index.html.twig', [
            'controller_name' => 'ReactCatController',
        ]);
    }

    #[Route('/react/scat', name: 'app_react_scat')]
    public function index2(): Response
    {
        return $this->render('react/index.html.twig', [
            'controller_name' => 'ReactCatController',
        ]);
    }
}
