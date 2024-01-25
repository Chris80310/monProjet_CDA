<?php

namespace App\Controller;

use App\Repository\UtilisateursRepository;
use App\Repository\CatRepository;
use App\Repository\ScatRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AccueilController extends AbstractController
{
    private $utilisateur;
    private $categorie;
    private $s_categorie;
    private $produit;
    private $details;
    private $top3ventes;
    private $top3sc;

    public function __construct(UtilisateursRepository $user, CatRepository $cat, ProduitRepository $prod, ProduitRepository $det, ProduitRepository $top3v, ScatRepository $scat, ScatRepository $top3sc)
    {
        // $this->utilisateur = $user;
        $this->categorie = $cat;
        $this->s_categorie = $scat;
        $this->produit = $prod;
        $this->details = $det;
        $this->top3ventes = $top3v;
        $this->top3sc = $top3sc;
    }
    
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        // $user = $this->utilisateur->find(1);
        $cat = $this->categorie->findAll();
        $scat = $this->s_categorie->findAll();
        $prod = $this->produit->findAll();
        // $top3v = $this->top3ventes->top3ventes();
        // $top3sc = $this->top3sc->top3_scat();
        // $det = $this->details->details();
            
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            // 'utilisateur' => $user,
            'categories' => $cat,
            'sous_categories' => $scat,
            'produits' => $prod,
            // 'details' => $det,
            // 'top3ventes' => $top3v,
            // 'top3_sous_cat' => $top3sc
        ]);
    }

    // Barre de recherche : 

    #[Route('/recherche', name: 'app_search')]
    public function recherche(Request $request): Response
    // ProduitRepository $prod, 
    {
        // Initialiser la requête avec le mot-clé de recherche vide
        $request = new Request([
            'recherche' => '',
        ]);
        // Récupérez le mot-clé de recherche de la requête HTTP
        $search = $request->request->get('search');

        // Trouvez les produits correspondants au mot-clé de recherche
        $prod = $this->produit->findSearch($search);

        // Vérifiez si des produits ont été trouvés
        if ($prod){
            // Afficher un message de réussite
            $this->addFlash('success', "Votre recherche a retourné " . count($prod) . " résultats.");
        } else {
            // Afficher un message d'avertissement
            $this->addFlash('warning', "Votre recherche n'a pas abouti.");
        }
        // Rendre la vue `accueil/recherche.html.twig` en passant les produits trouvés en paramètre
        return $this->render('accueil/search.html.twig', [
            'controller_name' => 'AccueilController',
            'produits' => $prod,
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

}



