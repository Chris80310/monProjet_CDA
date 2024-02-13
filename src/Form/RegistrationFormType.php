<?php

namespace App\Form;

// use App\Entity\User;
use App\Entity\Adresse;
use App\Entity\Utilisateurs;
// use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('nom_entr', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'nom de société :'])
            ->add('nom', TextType::class, [ 'attr' => [ 'class' => 'form-control my-3'], 'label' => 'nom :'])
            ->add('prenom', TextType::class, [ 'attr' => [ 'class' => 'form-control my-3'], 'label' => 'prenom :'])
            ->add('email', EmailType::class, [ 'attr' => [ 'class' => 'form-control my-3'], 'label' => 'email :'])
            ->add('livraison', TextType::class, [ 'attr' => [ 'class' => 'form-control my-3'],'label' => 'Adresse de livraison :'])
            ->add('facturation', TextType::class, [ 'attr' => [ 'class' => 'form-control  mb-5 mt-3'], 'label' => 'Adresse de facturation :', 'required' => false ])
            ->add('checkbox', CheckboxType::class, [
                'attr' => [ 'class' => 'm-3',
                'id' => 'check_fact'
            ],
                'label' => 'Utiliser la meme adresse pour la facturation',
                'required' => false,
                'mapped' => false
            ])

            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control mb-5 mt-3'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Saisissez un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => 'Mot de passe : '
            ])
     
            // ->add('RGPDConsent', CheckboxType::class, [
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'attr' => [ 'class' => 'mx-3'],
                'label' => 'En m\'inscrivant à ce site, j\'accepte les conditions générales du site'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // 'data_class' => User::class,
            'data_class' => Utilisateurs::class,
        ]);
    }
}
