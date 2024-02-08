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
            // ->add('nom_entr', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'nom de société'])
            ->add('nom', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'nom'])
            ->add('prenom', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'prenom'])
            ->add('email', EmailType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'email'])
            // ->add('adresse', TextType::class, ['attr' => [ 'class' => 'form-control'], 'label' => 'adresse'])
            ->add('livraison', TextType::class, ['label' => 'Adresse de livraison'])
            ->add('checkbox', CheckboxType::class, [
                'label' => 'Utiliser l\'adresse de livraison pour celle de facturation',
                'required' => false,
                'mapped' => false
            ])
            ->add('facturation', TextType::class, [ 'label' => 'Adresse de facturation', 'required' => false
            ])
            ->add('Enregistrer', SubmitType::class)
            // ->add('tel', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'tel'])
            // ->add('zipcode', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'code postal'])
            // ->add('ville', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'ville'])
     
            // ->add('RGPDConsent', CheckboxType::class, [
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'label' => 'En m\'inscrivant à ce site, j\'accepte les conditions générales du site'
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => 'Mot de passe : '
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
