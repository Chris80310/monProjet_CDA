<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Commande;
use App\Entity\Detail;
use App\Entity\Plat;
use App\Repository\ProduitRepository;
use App\Repository\UtilisateurRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierService
{
    private $requestStack;
    private $ProduitRepository;
    private $em;

    public function __construct(RequestStack $requestStack, ProduitRepository $ProduitRepository, EntityManagerInterface $em)
    {
        $this->requestStack = $requestStack;
        $this->ProduitRepository = $ProduitRepository;
        $this->em = $em;
    }

    //Panier ajout :
    public function addToCart(int $id): void
    {
        $panier =  $this->requestStack->getSession()->get('panier', []);
        // Si le panier n'est pas vide, on incrémente :
        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            // Sinon on ajoute le produit :
            $panier[$id] = 1;
        }

        $this->getSession()->set('panier', $panier);
    }

    private function getSession(): SessionInterface
    {
        return $this->requestStack->getSession();
    }

    public function panier()
    {
        $session = $this->requestStack->getSession();
        $panier =  $session->get('panier', []);
        if (empty($Panier)) {
            $panier = [];
            $Panier = $session->set('panier', $panier);
        };

        $Panier = $session->get('panier', []);
        $totalPanier = $Panier;


        foreach ($panier as $id => $quantite) {
            $totalPanier[] = [
                'plat' => $this->ProduitRepository->find($id),
                'quantite' => $quantite
            ];
        }
        return $totalPanier;
    }

    // Total panier :
    public function getTotal()
    {
        $session = $this->requestStack->getSession();
        $totalPanier = $this->panier();

        $total = 0;
        foreach ($totalPanier as $item) {
            $totalItem = $item['plat']->getPrix() * $item['quantite'];
            $total += $totalItem;
        }

        return $total;
    }

    public function addItems(int $id)
    {
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);

        // On incrémente la quantité : 
        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }
        $session->set('panier', $panier);

        return $panier;
    }

    public function removeItems(int $id)
    {
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);

        // On retire le produit du panier s'il n'y a qu'un seul exemplaire sinon on décrémente sa quantité : 
        if (!empty($panier[$id])) {
            if ($panier[$id] > 1)
                $panier[$id]--;
        } else {
            unset($panier[$id]);
        }
        $session->set('panier', $panier);

        return $panier;
    }

    public function deleteItems($id)
    {
        //Supprimer le produit du panier :
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }
        $session->set('panier', $panier);
        return $panier;
    }
}