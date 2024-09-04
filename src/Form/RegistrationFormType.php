<?php

namespace App\Form;

use App\Entity\User;
use PhpParser\Node\Name;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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
            ->add('email')
            ->add('userName')
            ->add('userLastname')
            ->add('userTel')
            ->add('userAdress')
            ->add('userAssoTel')
            ->add('userAssoName')
            ->add('userAssoAdress')
            ->add('userAssoSport')
            ->add('userAssoDescr')
            ->add('userTresorier')
            ->add('userPresident')
            ->add('userSiteInternet')
            ->add('userLienX')
            ->add('userLienFb')
            ->add('userLienInsta')
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
            ])
            ->add('imageFile', FileType::class,[
                'mapped' => false,
                'required'=> false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => true, // Activer la protection CSRF
            'csrf_field_name' => '_csrf_token',
            'csrf_token_id'   => 'authenticate', // ou un autre identifiant correspondant
            'data_class' => User::class,
        ]);
    }
}