<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryForm;
use App\Service\CategoryManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/category", name="app_category_")
 */
class CategoryController extends AppController
{

    /**
     * @Route("", name="add", methods={"POST"})
     * @param Request $request
     * @param CategoryManager $categoryManager
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function addNewAction(
        Request $request,
        CategoryManager $categoryManager,
        SerializerInterface $serializer
    ): JsonResponse
    {
        $category = new Category();
        $form = $this->createForm(CategoryForm::class, $category);
        $content = json_decode($request->getContent(), true);
        $form->submit($content);

        if ($form->isSubmitted() && $form->isValid()) {
            $categoryManager->saveCategory($category);

            return new JsonResponse($serializer->serialize($category, 'json'), 200, [], true);
        }

        return new JsonResponse(['errors' => $this->handleErrors($form)], 400);
    }

    /**
     * @Route("", name="list", methods={"GET"})
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function listAction(SerializerInterface $serializer): JsonResponse
    {
        $categoryRepository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $categoryRepository->findAll();
        $serializedCategories = $serializer->serialize($categories, 'json');
        return new JsonResponse($serializedCategories, 200, [], true);
    }
}
