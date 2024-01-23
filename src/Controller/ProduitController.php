<?php

namespace App\Controller;

use App\Repository\CatRepository;
use App\Repository\ScatRepository;
use App\Repository\UtilisateursRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    #[Route('/produit', name: 'app_produit')]
    public function produit(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

      // produit par id : 

      #[Route('/produit/{id}', name: 'app_produit')]
      public function prodParId(ScatRepository $scat): Response
      {
          $scat = $this->scat->find($scat);
          $produit = $this->produit->prodParSCat($scat->getId());
  
          // dd($produit);
  
          return $this->render('produits/prodParCat.html.twig', [
              'controller_name' => 'AccueilController',
              'produit' => $produit
          ]);
      }
  
      // Details prod :
  
      #[Route('/produit/{id}', name: 'detail_prod')]
      public function DetailProd(ProduitRepository $produit): Response
        {
            $produit = $this->produit->find($produit);

            return $this->render('produit/detail_prod.html.twig', [
                'controller_name' => 'ProduitController',
                'produit' => $produit
            ]);
        }
}
