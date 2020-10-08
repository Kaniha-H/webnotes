<?php

namespace App\Controller;

use App\Form\Category;
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
        
        $category = new Category;
        $form = $this->createForm(CategoryType::class, $category);

        
    }
    /**
     * @Route("/category/{id}/read", name="category:read")
     */
    public function read(Category $category)
    {
        return $this->render('category/read.html.twig', [
            'categories' => $category
        ]);
    }
    /**
     * @Route("/category/{id}/edit", name="category:upadte")
     */
    public function upadate(Category $category)
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handle($request);

        return $this->render('category/update.html.twig', [
           'form' => $form
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
