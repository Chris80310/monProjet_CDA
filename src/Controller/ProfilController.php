<?php

namespace App\Controller;

use App\Repository\UtilisateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    // #[Route('/profil', name: 'app_profil')]
    // public function index(): Response
    // {
    //     return $this->render('profil/index.html.twig', [
    //         'controller_name' => 'ProfilController',
    //     ]);
    // }

    private $userRepo;

    public function __construct(UtilisateursRepository $userRepo){

        $this->userRepo = $userRepo;
    }
    
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        // ICI on récupère l'identifiant unique de l'utilisateur connecté :
        $identifiant = $this->getUser()->getUserIdentifier();
        if($identifiant){
            // ICI on vérifie qu'on a bien un utilisateur dans la base de donnée qui a ce mail :
            $info = $this->userRepo->findOneBy(["email" =>$identifiant]); 
        }

        return $this->render('profil/index.html.twig', [
            'informations' => $info
        ]);
    }
}
