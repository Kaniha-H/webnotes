<?php

namespace App\Form;

use App\Entity\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // titre de la note
            ->add('title', TextType::class, [
                'label' => "Titre de la note",
                'label_attr' => [
                    'class' => 'col-sm-3 col-form-label'
                ],

                'require' => true,

                'attr' => [
                    'class' => "form-control"
                    // 'placeholder' => "Saisir la note"
                ],

                'help' => "Saisir le titre de votre note",
                'help' => [
                    'class' => "form-text text-muted"
                ]
            ])

            // contenu de la note
            ->add('content', TextareaType::class, [
                'label' => "Contenu de la note",
                'label_attr' => [
                    'class' => 'col-sm-3 col-form-label'
                ],

                'require' => true,

                'attr' => [
                    'class' => "form-control"
                    // 'placeholder' => "Saisir la note"
                ],

                'help' => "Saisir le contenu de votre note",
                'help' => [
                    'class' => "form-text text-muted"
                ]
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
