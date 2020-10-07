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
     * name: note:index
     */
    public function index()
    {
        return $this->render('note/index.html.twig', [
            'controller_name' => 'NoteController',
        ]);
    }

    
}
