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

    // #[Route('/profil/client', name:'app_profil_client')]
    // public function profil_customer(Request $request, Security $security, EntityManagerInterface $entityManager): Response 
    // {
    //     $this->denyAccessUnlessGranted('ROLE_CLIENT');
    //     $user = $security->getUser();
    //     $nameForm = $this->createForm(UserNameType::class);
    //     $nameForm->handleRequest($request);
    //     if($nameForm->isSubmitted() && $nameForm->isValid()) {
    //         $data = $nameForm->getData();
    //         $user->setNom($data->getNom());
    //         $user->setPrenom($data->getPrenom());
            
    //         $entityManager->persist($user);
    //         $entityManager->flush();

    //         $this->addFlash('Informations enregistrées avec succès.');
    //         return $this->redirectToRoute('app_profil_client');
    //     }

    //     $telForm = $this->createForm(UserTelType::class);
    //     $telForm->handleRequest($request);
    //     if ($telForm->isSubmitted() && $telForm->isValid()) {
    //         $data = $telForm->getData();
    //         $user->setTelephone($data->getTelephone());

    //         $entityManager->persist($user);
    //         $entityManager->flush();

    //         $this->addFlash('Informations enregistrées avec succès.');
    //         return $this->redirectToRoute('app_profil_client');
    //     }

    //     $emailForm = $this->createForm(UserEmailType::class);
    //     $emailForm->handleRequest($request);
    //     if ($emailForm->isSubmitted() && $emailForm->isValid()) {
    //         $data = $emailForm->getData();
    //         $user->setEmail($data->getEmail());
    //         $user->setIsVerified(false);

    //         $entityManager->persist($user);
    //         $entityManager->flush();

    //         $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
    //         (new TemplatedEmail())
    //             ->from(new Address('noreply@hardwareshop.com'))
    //             ->to($user->getEmail())
    //             ->subject('Confirmation de votre nouvelle adresse email')
    //             ->htmlTemplate('registration/confirmation_email.html.twig')
    //         );
    //         $this->addFlash('Un courriel de confirmation pour votre adresse email vous a été envoyé.');
    //         return $this->redirectToRoute('app_profil_client');
    //     }

    //     $passwordForm = $this->createForm(UserPasswordType::class);
    //     $passwordForm->handleRequest($request);
    //     if ($passwordForm->isSubmitted() && $passwordForm->isValid()) {
    //         $user = $security->getUser();
    //         assert($user instanceof \Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface);
    //         $data = $this->passwordHasher->hashPassword($user, $passwordForm->get('plainPassword')->getData());
    //         $user->setPassword($data);

    //         $entityManager->persist($user);
    //         $entityManager->flush();

    //         // TODO: Templated email
    //         $email = (new Email())
    //             ->from('noreply@filmo.com')
    //             ->to($user->getEmail())
    //             ->subject('Mot de passe modifié')
    //             ->text('Nous vous informons que votre mot de passe à été modifié le '.date('d-m-Y H:i:s'));
    //         $this->mailer->send($email);

    //         $this->addFlash('Votre nouveau mot de passe est enregistré.');
    //         return $this->redirectToRoute('app_profil_client');
        }   
    // }
