<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => "Prenom",
                'label_attr' => [
                    'class' => 'col-sm-3 col-form-label'
                ],

                // Definir si le champ est obligatoire ou non
                'required' => true,

                // Attributs du champ <input>
                'attr' => [
                    'class' => "form-control",
                    // 'placeholder' => "Saisir la note"
                ],

                // Texte d'aide
                'help' => "Saisir votre prenom",
                'help_attr' => [
                    'class' => "form-text text-muted"
                ]
            ])
            ->add('lastname', TextType::class, [

            ])
            ->add('email', EmailType::class, [

            ])
            ->add('password', PasswordType::class, [

            ])
            ->add('agreeTerms', CheckboxType::class, [

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
