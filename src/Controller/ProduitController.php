<?php

namespace App\Controller;

use App\Repository\CatRepository;
use App\Repository\ScatRepository;
use App\Repository\UtilisateursRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{

    private $user;
    private $cat;
    private $scat;
    private $produit;
    private $detail;

    public function __construct(UtilisateursRepository $user, CatRepository $cat, ScatRepository $scat, ProduitRepository $produit)
    // DetailRepository $detail
    {
        $this->user = $user;
        $this->scat = $scat;
        $this->cat = $cat;
        $this->produit = $produit;
    }

    // #[Route('/produit', name: 'app_produit')]
    // public function produit(): Response
    // {
    //     return $this->render('produit/index.html.twig', [
    //         'controller_name' => 'ProduitController',
    //     ]);
    // }

    //   produit par id : 

      #[Route('/produit', name: 'app_produit')]
      public function prodParId(ScatRepository $scat, Request $request): Response
      {
          $scat = $request->query->get('id');
          $produit = $this->produit->prodParScat($scat);
  
          dd($produit);
  
          return $this->render('produit/index.html.twig', [
              'controller_name' => 'AccueilController',
              'produit' => $produit
          ]);
      }
  
      // Details prod :
  
    //   #[Route('/produit/{id}', name: 'detail_prod')]
    //   public function DetailProd(ProduitRepository $produit): Response
    //     {
    //         $produit = $this->produit->find($produit);

    //         return $this->render('produit/detail_prod.html.twig', [
    //             'controller_name' => 'ProduitController',
    //             'produit' => $produit
    //         ]);
    //     }
}
