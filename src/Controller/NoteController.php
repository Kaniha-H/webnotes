<?php

namespace App\Controller;

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
     */
    public function create()
    {
        return $this->render('note/create.html.twig');
    }

    /**
     * @Route("/{id}", name=":read")
     */
    public function read($id)
    {
        return $this->render('note/read.html.twig', [
            'id' => $id
        ]);
    }

    /**
     * @Route("/{id}/edit", name=":update")
     */
    public function update($id)
    {
        return $this->render('note/update.html.twig', [
            'id' => $id
        ]);
    }

    /**
     * @Route("/{id}/delete", name=":delete")
     */
    public function delete($id)
    {
        return $this->render('note/delete.html.twig', [
            'id' => $id
        ]);
    }
}
