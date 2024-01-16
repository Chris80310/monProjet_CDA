<?php
namespace App\Controller;

use App\Repository\DetailRepository;
use App\Repository\UtilisateursRepository;
use App\Repository\CatRepository;
use App\Repository\SCatRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    class AccueilController extends AbstractController
{
    private $user;
    private $cat;
    private $scat;
    private $produit;
    // private $detail;

    public function __construct(UtilisateursRepository $user, ProduitRepository $produit)
    // DetailRepository $detailRepo
    // CatRepository $catRepo
    {
        $this->user = $user;
        // $this->catRepo = $catRepo;
        $this->produit = $produit;
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

    // #[Route('/search', name: 'app_search')]
    // public function search(ProduitRepository $produit, Request $request): Response
    // {

    //     $request = new Request([
    //         'recherche' => '',
    //     ]);
        
    //     $search = $request->request->get('search');
    //     $reach = $this->produit->findSearch($search);
    //     if ($reach) {
    //         $this->addFlash('success', "Votre recherche a retourné " . count($produit) . " résultats.");
    //                 } else {
    //         $this->addFlash('warning', "Votre recherche n'a pas abouti.");
    //                 }

    //     return $this->render('accueil/search.html.twig', [
    //         'controller_name' => 'AccueilController',
    //         'reach' => $reach,
    //     ]);
    // }

    #[Route('/recherche', nom: 'app_search')]
    public function recherche(ProduitRepository $produit, Request $request): Response
    {
        // Initialiser la requête avec le mot-clé de recherche vide
        $request = new Request([
            'recherche' => '',
        ]);

        // Récupérez le mot-clé de recherche de la requête HTTP
        $search = $request->request->get('search');

        // Trouvez les produits correspondants au mot-clé de recherche
        $produits = $this->produit->trouverRecherche($search);

        // Vérifiez si des produits ont été trouvés
        if ($produits) {
            // Afficher un message de réussite
            $this->addFlash('success', "Votre recherche a retourné " . count($produits) . " résultats.");
        } else {
            // Afficher un message d'avertissement
            $this->addFlash('warning', "Votre recherche n'a pas abouti.");
        }

        // Rendre la vue `accueil/recherche.html.twig` en passant les produits trouvés en paramètre
        return $this->render('accueil/search.html.twig', [
            'controller_name' => 'AccueilController',
            'produits' => $produits,
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



