<?php

namespace App\Controller;

// use App\Entity\User;
use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

class RegistrationController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/registration', name: 'app_registration')]
    public function index(UserPasswordHasherInterface $passwordHasher): Response
    {
        // User 1
        $user1 = new Utilisateurs('user1');
        $plaintextPassword1 = 'password1';
        $hashedPassword1 = $passwordHasher->hashPassword($user1, $plaintextPassword1);
        $user1->setPassword($hashedPassword1);

        // User 2
        $user2 = new Utilisateurs('user2');
        $plaintextPassword2 = 'password2';
        $hashedPassword2 = $passwordHasher->hashPassword($user2, $plaintextPassword2);
        $user2->setPassword($hashedPassword2);

        // Persist users to the database
        $this->entityManager->persist($user1);
        $this->entityManager->persist($user2);
        $this->entityManager->flush();

        // You need to decide what to do next; typically, render a template or redirect
        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
        ]);
    }
}
