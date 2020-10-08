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
     * @Route("/categories", name="category:index")
     */
    public function index(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories
        ]);
    }
    
    /**
     * @Route("/category", name="category:create")
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
     * @Route("/category/{id}", name="category:read")
     */
    public function read(Category $category)
    {
        return $this->render('category/read.html.twig', [
            'category' => $category
        ]);
    }
    
    /**
     * @Route("/category/{id}/edit", name="category:update")
     */
    public function update(Category $category)
    {
        return $this->render('category/update.html.twig', [
        ]);
    }
    
    /**
     * @Route("/category/{id}/delete", name="category:delete")
     */
    public function delete()
    {
        return $this->render('category/delete.html.twig', [
        ]);
    }
}
