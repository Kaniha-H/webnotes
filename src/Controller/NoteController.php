<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\NoteType;
use App\Repository\NoteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * Route("/notes", name="note:index")
     * 
     * path : /notes
     * name: note:index
     */
    // public function index(NoteRepository $noteRepository)
    public function index()
    {
        if (!$this->getUser()) 
        {
            return $this->redirectToRoute('app_login');
        }

        // ...
        return $this->render('note/index.html.twig', [
            // 'notes' => $noteRepository->findAll()
            // 'notes' => $this->getUser()->getNotes()
        ]);
    }

    /**
     * @Route("", name=":create")
     * Route("/note", name="note:create")
     */
    public function create(Request $request)
    {
        // Création d'une nouvelle entité "Note"
        $note = new Note;

        // dump($request->getMethod());
        // dump($note);

        // Création du formulaire basé sur la classe "NoteType"
        $form = $this->createForm(NoteType::class, $note);

        // Handle the Request
        $form->handleRequest($request);

        // $request
        // ->Attrape des données de la requete
        // ->$name = $_POST['name'];

        // Catch form submission
        if ( $form->isSubmitted() ) 
        {
            // $form->isSubmitted() 
            // -> Test la methode HTTP === POST

            // $form->isValid()
            // -> Controle de données


            // Manip de données
            // Liaison d'un utilisateur à la note
            $note->setUser( $this->getUser() );

            // Requete 'INSERT INTO ....'
            // Requete 'UPDATE ...'
            // Equivalent de la connexion PDO
            $em = $this->getDoctrine()->getManager();

            // Ajoute à la memoire de PDO la requete d'insert ou update
            $em->persist($note); 
            // Execute la requet
            $em->flush();



            // redirige l'utilisateur
            return $this->redirectToRoute("note:index");
        }

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
    public function read(Note $note)
    {
        return $this->render('note/read.html.twig', [
            'note' => $note
        ]);
    }

    /**
     * @Route("/{id}/edit", name=":update")
     * Route("/note/{id}/edit", name="note:update")
     */
    public function update(Note $note, Request $request)
    {
        $form = $this->createForm(NoteType::class, $note);

        $form->handleRequest($request);

        if ( $form->isSubmitted() )
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($note); 
            $em->flush();

            return $this->redirectToRoute("note:read", [
                'id' => $note->getId()
            ]);
        }

        $form = $form->createView();

        return $this->render('note/update.html.twig', [
            'form' => $form, // Passe le formulaire à la vue Twig
            'note' => $note
        ]);
    }

    /**
     * @Route("/{id}/delete", name=":delete")
     * Route("/note/{id}/delete", name="note:delete")
     */
    public function delete(Note $note, Request $request)
    {
        if ($request->getMethod() == 'DELETE')
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($note); // PAS DE PERSIST
            $em->flush();

            return $this->redirectToRoute('note:index');
        }

        return $this->render('note/delete.html.twig', [
            'note' => $note
        ]);
    }
}