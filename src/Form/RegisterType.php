<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            // Firstname
            ->add('firstname', TextType::class, [
                // Texte et Attributs de la balise <label>
                'label' => "Prénom",
                'label_attr' => [
                    'class' => 'sr-only'
                ],

                // Definir si le champ est obligatoire ou non
                'required' => true,

                // Attributs du champ <input>
                'attr' => [
                    // 'class' => "form-control",
                    'placeholder' => "Prénom"
                ],

                // Texte d'aide
                'help' => "Saisir votre prénom",
                'help_attr' => [
                    'class' => ""
                ]

                // Contraintes
                // ...

            ])
        
            // lastname
            ->add('lastname', TextType::class, [
                // Texte et Attributs de la balise <label>
                'label' => "Nom",
                'label_attr' => [
                    'class' => 'sr-only'
                ],

                // Definir si le champ est obligatoire ou non
                'required' => true,

                // Attributs du champ <input>
                'attr' => [
                    // 'class' => "form-control",
                    'placeholder' => "Nom"
                ],

                // Texte d'aide
                'help' => "Saisir votre Nom",
                'help_attr' => [
                    'class' => ""
                ]

                // Contraintes
                // ...

            ])
            
            // email
            ->add('email', RepeatedType::class, [
                'type' => EmailType::class,
                'required' => true,
                
                'first_options' => [
                    'label' => "Email",
                    'label_attr' => [
                        'class' => "sr-only",
                    ],

                    // Attributs du champ <input>
                    'attr' => [
                        // 'class' => "form-control",
                        'placeholder' => "Email",
                    ],

                    // Texte d'aide
                    'help' => "Saisir votre adresse email",
                    'help_attr' => [
                        'class' => "form-text text-muted",
                    ],
                ],
                'second_options' => [
                    'label' => "Repéter votre Email",
                    'label_attr' => [
                        'class' => "sr-only",
                    ],

                    // Attributs du champ <input>
                    'attr' => [
                        // 'class' => "form-control",
                        'placeholder' => "Repéter votre Email",
                    ],

                    // Texte d'aide
                    'help' => "Saisir votre adresse email",
                    'help_attr' => [
                        'class' => "form-text text-muted",
                    ],
                ],
            ])

            // ->add('email', EmailType::class, [
            //     // Texte et Attributs de la balise <label>
            //     'label' => "Email",
            //     'label_attr' => [
            //         'class' => "sr-only",
            //     ],

            //     // Definir si le champ est obligatoire ou non
            //     'required' => true,

            //     // Attributs du champ <input>
            //     'attr' => [
            //         // 'class' => "form-control",
            //         'placeholder' => "Email",
            //     ],

            //     // Texte d'aide
            //     'help' => "Saisir votre adresse email",
            //     'help_attr' => [
            //         'class' => "form-text text-muted",
            //     ],

            //     // Contraintes
            //     // ...

            // ])
            
            // password
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => [
                    'label' => "Entrer votre mot de passe",
                    'label_attr' => [
                        'class' => "sr-only",
                    ],
                    'attr' => [
                        'placeholder' => "Entrer votre mot de passe",
                    ],
                    'help' => "Saisir Entrer votre mot de passe",
                    'help_attr' => [
                        'class' => "form-text text-muted",
                    ]
                ],
                'second_options' => [
                    'label' => "Répéter votre mot de passe",
                    'label_attr' => [
                        'class' => "sr-only",
                    ],
                    'attr' => [
                        'placeholder' => "Répéter votre mot de passe",
                    ],
                    'help' => "Répéter votre mot de passe",
                    'help_attr' => [
                        'class' => "form-text text-muted",
                    ]
                ],
            ])
            

            // ->add('password', PasswordType::class, [
            //     // Texte et Attributs de la balise <label>
            //     'label' => "Mot de passe",
            //     'label_attr' => [
            //         'class' => 'sr-only'
            //     ],

            //     // Definir si le champ est obligatoire ou non
            //     'required' => true,

            //     // Attributs du champ <input>
            //     'attr' => [
            //         // 'class' => "form-control",
            //         'placeholder' => "Mot de passe"
            //     ],

            //     // Texte d'aide
            //     'help' => "Saisir Entrer votre email",
            //     'help_attr' => [
            //         'class' => "form-text text-muted"
            //     ]

            //     // Contraintes
            //     // ...

            // ])
            
            // agreeTerms
            ->add('agreeTerms', CheckboxType::class, [
                // Texte et Attributs de la balise <label>
                'label' => null,
                'label_attr' => [
                    'class' => 'sr-only'
                ],

                // Definir si le champ est obligatoire ou non
                'required' => true,

                // Attributs du champ <input>
                'attr' => [
                    // 'placeholder' => "Saisir la note"
                ],

                // Texte d'aide
                // 'help' => "Saisir le nom de la catégorie",
                // 'help_attr' => [
                //     'class' => "form-text text-muted"
                // ]

                // Contraintes
                // ...

            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
