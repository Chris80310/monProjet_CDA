<?php
namespace App\Controller;

use App\Repository\DetailRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
//     private $userRepo;
//     private $catRepo;
//     private $prodRepo;
//     private $detailRepo;

//     public function __construct(UtilisateurRepository $userRepo, CategorieRepository $catRepo, ProduitRepository $prodRepo, DetailRepository $detailRepo)
//     {
//         $this->userRepo = $userRepo;
//         $this->catRepo = $catRepo;
//         $this->prodRepo = $prodRepo;
//         $this->detailRepo = $detailRepo;
//     }

//     #[Route('/', name: 'app_accueil')]
//     public function index(): Response
//     {
//         $util = $this->userRepo->find(1);
//         $categories = $this->catRepo->findAll();
//         $produits = $this->prodRepo->findAll();
//         $top3ventes = $this->detailRepo->top3ventes();
//         $top3_ss_cat = $this->detailRepo->top3_ss_cat();

//         return $this->render('accueil/index.html.twig', [
//             'controller_name' => 'AccueilController',
//             'utilisateur' => $userRepo,
//             'categories' => $categories,
//             'produits' => $produits,
//             'top3ventes' => $top3ventes,
//             'top3_ss_cat' => $top3_ss_cat
//         ]);
//     }

    // Barre de recherche : 

    // #[Route('/search', name: 'app_search')]
    // public function search(ProduitRepository $produits, Request $request): Response
    // {
    //     $search = $request->request->get('search');
    //     $reach = $prodRepo->findSearch($search);
    //     if ($reach) {
    //         $this->addFlash('success', "Votre recherche a retourné " . count($produits) . " résultats.");
    //     } else {
    //         $this->addFlash('warning', "Votre recherche n'a pas abouti.");
    //     }

    //     return $this->render('accueil/search.html.twig', [
    //         'controller_name' => 'AccueilController',
    //         'reach' => $reach,
    //     ]);
    // }

    // Politique de confidentialité : 

    // #[Route('/confid', name: 'app_confid')]
    // public function politique_confidentialite(): Response
    // {
    //     return $this->render('accueil/confid.html.twig', [
    //         'controller_name' => 'AccueilController',
    //     ]);
    // }

    // Mentions légales :

    // #[Route('/mentions', name: 'app_mentions')]
    // public function mentions_legales(): Response
    // {
    //     return $this->render('accueil/mentions.html.twig', [
    //         'controller_name' => 'AccueilController',
    //     ]);
    // }



