<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Category Name 
            ->add('name', TextType::class, [
                // Texte et Attributs de la balise <label>
                'label' => "Nom de la catégorie",
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
                'help' => "Saisir le nom de la catégorie",
                'help_attr' => [
                    'class' => "form-text text-muted"
                ]

                // Contraintes
                // ...
            ])

            // Category Description
            ->add('description', TextareaType::class, [
                // Texte et Attributs de la balise <label>
                'label' => "Description de la categorie",
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
                'help' => "Saisir la description de la categorie",
                'help_attr' => [
                    'class' => "form-text text-muted"
                ]

                // Contraintes
                // ...
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
