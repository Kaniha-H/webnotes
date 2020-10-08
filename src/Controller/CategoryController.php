<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categories", name="category:index", methods={"HEAD","GET"})
     */
    public function index(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories
        ]);
    }
    
    /**
     * @Route("/category", name="category:create", methods={"HEAD","GET","POST"})
     */
    public function create(Request $request)
    {
        // Create new entity
        $category = new Category;

        $form = $this->createForm(CategoryType::class, $category);
        
        $form->handleRequest($request);

        if ( $form->isSubmitted() ) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category); 
            $em->flush();

            return $this->redirectToRoute("category:index");
        }

        $form = $form->createView();

        return $this->render('category/create.html.twig', [
            'form' => $form
        ]);
    }
    
    /**
     * @Route("/category/{id}", name="category:read", methods={"HEAD","GET"})
     */
    public function read(Category $category)
    {
        return $this->render('category/read.html.twig', [
            'category' => $category
        ]);
    }
    
    /**
     * @Route("/category/{id}/edit", name="category:update", methods={"HEAD","GET","POST"})
     */
    public function update(Category $category, Request $request)
    {
        $form = $this->createForm(CategoryType::class, $category);
        
        $form->handleRequest($request);

        if ( $form->isSubmitted() ) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category); 
            $em->flush();

            return $this->redirectToRoute("category:index");
        }

        $form = $form->createView();

        return $this->render('category/update.html.twig', [
            'form' => $form
        ]);
    }
    
    /**
     * @Route("/category/{id}/delete", name="category:delete", methods={"HEAD","GET","DELETE"})
     */
    public function delete(Category $category, Request $request)
    {
        if ($request->getMethod() == 'DELETE')
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($category); // PAS DE PERSIST
            $em->flush();

            return $this->redirectToRoute('category:index');
        }

        return $this->render('category/delete.html.twig', [
            'category' => $category
        ]);
    }
}
