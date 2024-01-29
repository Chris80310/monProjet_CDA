<?php

namespace App\Controller;

// use App\Entity\User;
use App\Entity\Utilisateurs;
use App\Form\RegistrationFormType;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    // #[Route('/registration', name: 'app_registration')]
    // public function index(UserPasswordHasherInterface $passwordHasher): Response
    // {
    //     // User 1
    //     $user1 = new Utilisateurs('user1');
    //     $plaintextPassword1 = 'password1';
    //     $hashedPassword1 = $passwordHasher->hashPassword($user1, $plaintextPassword1);
    //     $user1->setPassword($hashedPassword1);

    //     // User 2
    //     $user2 = new Utilisateurs('user2');
    //     $plaintextPassword2 = 'password2';
    //     $hashedPassword2 = $passwordHasher->hashPassword($user2, $plaintextPassword2);
    //     $user2->setPassword($hashedPassword2);

    //     // Persist users to the database
    //     $this->entityManager->persist($user1);
    //     $this->entityManager->persist($user2);
    //     $this->entityManager->flush();

    //     // You need to decide what to do next; typically, render a template or redirect
    //     return $this->render('registration/index.html.twig', [
    //         'controller_name' => 'RegistrationController',
    //     ]);
    // }

    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, 
    UserAuthenticatorInterface $userAuthenticator, UsersAuthenticator $authenticator, 
    EntityManagerInterface $entityManager): Response
    {
        $user = new Utilisateurs();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
