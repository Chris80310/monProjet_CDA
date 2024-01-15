<?php

namespace App\Controller;

use App\Repository\CatRepository;
use App\Repository\SCatRepository;
use App\Repository\UtilisateursRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{

    private $userRepo;
    private $catRepo;
    private $produitRepo;

    public function __construct(UtilisateursRepository $userRepo, CatRepository $catRepo, ProduitRepository $produitRepo, DetailRepository $detailRepo)
    {
        $this->userRepo = $userRepo;
        $this->catRepo = $catRepo;
        $this->produitRepo = $produitRepo;
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
      public function prodParId(Cat $id): Response
      {
          $categorie = $this->catRepo->find($id);
          $prod = $this->produitRepo->prodParCat($categorie->getId());
  
          // dd($prod);
  
          return $this->render('produits/prodParCat.html.twig', [
              'controller_name' => 'AccueilController',
              'produit' => $prod
          ]);
      }
  
      // Details prod :
  
      #[Route('/detail_prod/{id}', name: 'app_detail_prod')]
      public function prodDetail(prod $id): Response
        {
            $prod = $this->produitRepo->find($id);

            return $this->render('detail_prod/detail_prod.html.twig', [
                'controller_name' => 'prodController',
                'prod' => $prod,
            ]);
        }
}
