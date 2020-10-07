<?php

namespace App\Controller;

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
        return $this->render('note/create.html.twig');
    }

    /**
     * @Route("/{id}", name=":read")
     */
    public function read($uuid)
    {
        return $this->render('note/read.html.twig', [
            'id' => $uuid;
        ]);
        
    }

    /**
     * @Route("/{id}/edit", name=":update")
     */
    public function update()
    {
        return $this->render('note/update.html.twig');
        
    }

    /**
     * @Route("/{id}/delete", name=":delete")
     */
    public function delete()
    {
        return $this->render('note/delete.html.twig');
        
    }
}
