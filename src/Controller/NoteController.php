<?php

namespace App\Controller;

use App\Form\NoteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/note", name="note")
 */
class NoteController extends AbstractController
{
    // Liste des notes          note:index      /notes
    // Creation d'une note      note:create     /note
    // Lire une note            note:read       /note/{id}
    // MAJ d'une note           note:update     /note/{id}/edit
    // Supprimer d'une note     note:delete     /note/{id}/delete

    /**
     * @Route("s", name=":index")
     * 
     * Route("/notes", name="note:index")
     * 
     * path : /notes
     * name: note:index
     */
    public function index()
    {
        return $this->render('note/index.html.twig', [
            'controller_name' => 'NoteController',
        ]);
    }

    /**
     * @Route("", name=":create")
     * Route("/note", name="note:create")
     */
    public function create()
    {
        // Création du formulaire basé sur la classe "NoteType"
        $form = $this->createForm(NoteType::class);

        // ...

        // Création de la vue du formulaire
        $form = $form->createView();

        return $this->render('note/create.html.twig', [
            'form' => $form // Passe le formulaire à la vue Twig
        ]);
    }

    /**
     * @Route("/{id}", name=":read")
     * Route("/note/{id}", name="note:read")
     */
    public function read($id)
    {
        return $this->render('note/read.html.twig', [
            'id' => $id
        ]);
    }

    /**
     * @Route("/{id}/edit", name=":update")
     * Route("/note/{id}/edit", name="note:update")
     */
    public function update($id)
    {
        // Création du formulaire basé sur la classe "NoteType"
        $form = $this->createForm(NoteType::class);

        // ...

        // Création de la vue du formulaire
        $form = $form->createView();

        return $this->render('note/update.html.twig', [
            'id' => $id,
            'form' => $form // Passe le formulaire à la vue Twig
        ]);
    }

    /**
     * @Route("/{id}/delete", name=":delete")
     * Route("/note/{id}/delete", name="note:delete")
     */
    public function delete($id)
    {
        return $this->render('note/delete.html.twig', [
            'id' => $id
        ]);
    }
}
