<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssociationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('userName')
            ->add('userLastname')
            ->add('userAssoName')
            ->add('userTel')
            ->add('userAssoTel')
            ->add('userAdress')
            ->add('userAssoAdress')
            ->add('userAssoSport')
            ->add('userAssoDescr')
            ->add('userDateCreation', null, [
                'widget' => 'single_text',
            ])
            ->add('imageFileName')
            ->add('userTresorier')
            ->add('userPresident')
            ->add('userSiteInternet')
            ->add('userLienX')
            ->add('userLienFb')
            ->add('userLienInsta')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
