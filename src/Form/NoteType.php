<?php

namespace App\Form;

use App\Entity\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            // Titre de la note
            ->add('title', TextType::class, [
                // Texte et Attributs de la balise <label>
                'label' => "Titre de la note",
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
                'help' => "Saisir le titre de votre note",
                'help_attr' => [
                    'class' => "form-text text-muted"
                ]

                // Contraintes
                // ...
            ])

            // Contenu de la note
            ->add('content', TextareaType::class, [
                // Texte et Attributs de la balise <label>
                'label' => "Contenu de la note",
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
                'help' => "Saisir le contenu de votre note",
                'help_attr' => [
                    'class' => "form-text text-muted"
                ]

                // Contraintes
                // ...
            ])

            // ->add('illustration')
            // ->add('createAt')
            // ->add('isArchived')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
