<?php
namespace App\Controller;

use App\Repository\DetailRepository;
use App\Repository\UtilisateursRepository;
use App\Repository\CatRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    class AccueilController extends AbstractController
{
    // private $userRepo;
    // private $catRepo;
    private $produitRepo;
    // private $detailRepo;

    public function __construct(UtilisateursRepository $userRepo, CatRepository $catRepo, ProduitRepository $produitRepo, DetailRepository $detailRepo)
    {
        // $this->userRepo = $userRepo;
        // $this->catRepo = $catRepo;
        $this->produitRepo = $produitRepo;
        // $this->detailRepo = $detailRepo;
    }
    
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

        // Barre de recherche : 

    #[Route('/search', name: 'app_search')]
    public function search(ProduitRepository $produit, Request $request): Response
    {

        $request = new Request([
            'recherche' => '',
        ]);
        
        $search = $request->request->get('search');
        $reach = $this->produitRepo->findSearch($search);
        if ($reach) {
            $this->addFlash('success', "Votre recherche a retourné " . count($produit) . " résultats.");
                    } else {
            $this->addFlash('warning', "Votre recherche n'a pas abouti.");
                    }

        return $this->render('accueil/search.html.twig', [
            'controller_name' => 'AccueilController',
            'reach' => $reach,
        ]);
    }


     // Politique de confidentialité : 

     #[Route('/confid', name: 'app_confid')]
     public function politique_confidentialite(): Response
     {
         return $this->render('accueil/confid.html.twig', [
             'controller_name' => 'AccueilController',
         ]);
     }
 
     // Mentions légales :
 
     #[Route('/mentions', name: 'app_mentions')]
     public function mentions_legales(): Response
     {
         return $this->render('accueil/mentions.html.twig', [
             'controller_name' => 'AccueilController',
         ]);
}
//     private $userRepo;
//     private $catRepo;
//     private $prodRepo;
//     private $detailRepo;

//     public function __construct(UtilisateursRepository $userRepo, CatRepository $catRepo, ProduitRepository $prodRepo, DetailRepository $detailRepo)
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
//         $produit = $this->prodRepo->findAll();
//         $top3ventes = $this->detailRepo->top3ventes();
//         $top3_ss_cat = $this->detailRepo->top3_ss_cat();

//         return $this->render('accueil/index.html.twig', [
//             'controller_name' => 'AccueilController',
//             'utilisateur' => $userRepo,
//             'categories' => $categories,
//             'produit' => $produit,
//             'top3ventes' => $top3ventes,
//             'top3_ss_cat' => $top3_ss_cat
//         ]);
//     }

}



