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
    /**
     * @Route("s", name=":index")
     * 
     * path : /notes
     * name : note:index
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
        // Attention : mettre manuellement use App\Form\NoteType;
        $form = $this->createForm(NoteType::class);

        $form = $form->createView();

        return $this->render('note/create.html.twig', [
            'form' => $form // passe le formulaire à la vue Twig
        ]);
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
