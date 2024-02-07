<?php

namespace App\Controller;

// use App\Entity\User;
use App\Entity\Utilisateurs;
use App\Form\RegistrationFormType;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Mime\Address;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    // private EmailVerifier $emailVerifier;

    // public function __construct(EmailVerifier $emailVerifier)
    // {
    //     $this->emailVerifier = $emailVerifier;
    // }
    
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

        // accès accordé :
        $acces_ok = $this->isGranted('ROLE_ADMIN');
        // refuser l'accès sauf s'il est accordé :
        $this->denyAccessUnlessGranted('ROLE_ADMIN'); 

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setRoles(['ROLE_USER']);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $user,
                (new TemplatedEmail())
                    ->from(new Address('contact@district.com', 'chris'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );

            return $this->redirectToRoute('app_accueil');

            // return $userAuthenticator->authenticateUser(
            //     $user,
            //     $authenticator,
            //     $request
            // );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('succès', 'Votre adresse e-mail a été vérifiée.');

        return $this->redirectToRoute('app_register');
    }
}
