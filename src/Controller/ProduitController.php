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
    private $produits;
    private $detail;

    public function __construct(UtilisateursRepository $user, CatRepository $cat, ScatRepository $scat, ProduitRepository $produits)
    // DetailRepository $detail
    {
        $this->user = $user;
        $this->scat = $scat;
        $this->cat = $cat;
        $this->produits = $produits;
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
          $produits = $this->produits->prodParScat($scat);
  
        //   dd($produit);
  
          return $this->render('produit/index.html.twig', [
              'controller_name' => 'AccueilController',
              'produits' => $produits
          ]);
      }
  
        //   Details prod :
  
    //   #[Route('/produit/{id}', name: 'detail_prod')]
    //   public function DetailProd(ProduitRepository $produits, CatRepository $cat, ScatRepository $scat, Request $request): Response
    //     {
    //         // $produits = $this->produits->find($produits);
    //         $cat = $request->query->get('id');
    //         $scat = $request->query->get('id');
    //         $produits = $this->produits->prodParScat($scat);

    //         return $this->render('produit/detail_prod.html.twig', [
    //             'controller_name' => 'ProduitController',
    //             'produits' => $produits
    //         ]);
    //     }

        #[Route('/produit/details{id}', name: 'detail_prod')]
        public function DetailProd(ProduitRepository $produits, Request $request): Response
        {
            $produitId = $request->attributes->get('id');
            $produit = $this->produits->find($produitId);

            return $this->render('produit/detail_prod.html.twig', [
                'controller_name' => 'ProduitController',
                'produit' => $produit,
            ]);
        }

}
