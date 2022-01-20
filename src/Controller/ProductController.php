<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductForm;
use App\Service\ProductManager;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/product", name="app_product_")
 */
class ProductController extends AppController
{

    /**
     * @Route("", name="add", methods={"POST"})
     * @param Request $request
     * @param ProductManager $productManager
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function addNewAction(
        Request $request,
        ProductManager $productManager,
        SerializerInterface $serializer
    ): JsonResponse
    {
        $product = new Product();
        $form = $this->createForm(ProductForm::class, $product);
        $content = json_decode($request->getContent(), true);
        $form->submit($content);

        if ($form->isSubmitted() && $form->isValid()) {
            $productManager->saveProduct($product);

            return new JsonResponse($serializer->serialize($product, 'json'), 200, [], true);
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
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $products = $productRepository->findAll();
        $serializedProducts = $serializer->serialize($products, 'json');
        return new JsonResponse($serializedProducts, 200, [], true);
    }
}