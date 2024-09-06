<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email([
                        'message' => 'The email {{ value }} is not a valid email.',
                    ]),
                ],
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
                    new Assert\Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/',
                        'message' => 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.',
                    ]),
                ],
            ])
            ->add('userName', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 25,
                        'minMessage' => 'Le nom doit au moins {{ limit }} characters',
                        'maxMessage' => 'Le nom doit au maxi {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('userLastname', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 25,
                        'minMessage' => 'Le nom doit au moins {{ limit }} characters',
                        'maxMessage' => 'Le nom doit au maxi {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('userAssoName', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 25,
                        'minMessage' => 'Le nom doit au moins {{ limit }} characters',
                        'maxMessage' => 'Le nom doit au maxi {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('userTel', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => '/^(0|(\\+33)|(0033))[1-9][0-9]{8}/',
                        'message' => 'The phone number is not valid.',
                    ]),
                ],
            ])
            ->add('userAssoTel', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => '/^(0|(\\+33)|(0033))[1-9][0-9]{8}/',
                        'message' => 'The association phone number is not valid.',
                    ]),
                ],
            ])
            ->add('userAdress', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('userAssoAdress', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('userAssoSport', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 25,
                        'minMessage' => 'Le sport doit au moins {{ limit }} characters',
                        'maxMessage' => 'Le sport doit au maxi {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('userAssoDescr', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('userTresorier', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 25,
                        'minMessage' => 'Le nom doit au moins {{ limit }} characters',
                        'maxMessage' => 'Le nom doit au maxi {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('userPresident', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 25,
                        'minMessage' => 'Le nom doit au moins {{ limit }} characters',
                        'maxMessage' => 'Le nom doit au maxi {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('userSiteInternet', TextType::class, [
                'required' => false,
            ])
            ->add('userLienX', TextType::class, [
                'required' => false,
            ])
            ->add('userLienFb', TextType::class, [
                'required' => false,
            ])
            ->add('userLienInsta', TextType::class, [
                'required' => false,
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new Assert\File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image (jpeg or png).',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'validation_groups' => ['Default'],
        ]);
    }
}
