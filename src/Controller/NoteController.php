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
    public function index(NoteRepository $noteRepository)
    {
        return $this->render('note/index.html.twig', [
            'notes' => $noteRepository->findAll()
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
            // dd($note);


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

        // Test la methode HTTP === POST
            // Attrape des données de la requete
            // $name = $_POST['name'];

            // Controle de données

            // Requete 'INSERT INTO ....'
            // Requete 'UPDATE ...'

            // redirige l'utilisateur



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