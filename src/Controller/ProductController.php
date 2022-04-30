<?php

namespace App\Controller;

use App\Controller\ApiController;
use App\Repository\ProductRepository;
use App\Entity\Order;
use App\Entity\Product;
use App\Security\AppCustomAuthenticator;
use App\Service\UserService;
use Doctrine\DBAL\Driver\Exception;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends ApiController
{
    /**
     * @Route("/api/products", name="app_product_all", methods={"GET"})
     */
    public function showAll(ProductRepository $productRepository): JsonResponse
    {
        $product = $productRepository->findAll();

        return $this->json($product);
    }

    /**
     * @Route("/api/products/{id}", name="app_product_one", methods={"GET"})
     */
    public function showOne(ProductRepository $productRepository, int $id): JsonResponse
    {
        $product = $productRepository->find(['id' => $id]);

        if (!$product) {
            return $this->respondNotFound();
        }
        return $this->json($product);
    }

    /**
     * @Route("/api/products", name="app_product_create", methods={"POST"})
     */
    public function create(Request $request): JsonResponse
    {
        $request = $this->transformJsonBody($request);
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product
            ->setName($request->get('name', 0), '')
            ->setDescription($request->get('description', 0), '')
            ->setPhoto($request->get('photo', 0), '')
            ->setPrice($request->get('price', 0), 0);

        $entityManager->persist($product);
        $entityManager->flush();


        return $this->json('product ' . $product->getName() . ' created successfully');
    }

    /**
     * @Route("/api/products/{id}", name="app_product_update", methods={"PUT"})
     */
    public function update(Request $request, ProductRepository $productRepository, int $id): JsonResponse
    {
        $request = $this->transformJsonBody($request);

        $product = $productRepository->find(['id' => $id]);

        if (!$product) {
            return $this->respondNotFound();
        }

        $entityManager = $this->getDoctrine()->getManager();

        if ($request->get('name')) {
            $product
                ->setName($request->get('name'));
        }
        if ($request->get('description')) {
            $product
                ->setName($request->get('description'));
        }
        if ($request->get('photo')) {
            $product
                ->setName($request->get('photo'));
        }
        if ($request->get('price')) {
            $product
                ->setName($request->get('price'));
        }

        $entityManager->persist($product);
        $entityManager->flush();


        return $this->json('product ' . $product->getName() . ' updated successfully');
    }

    /**
     * @Route("/api/products/{id}", name="app_product_delete", methods={"DELETE"})
     */
    public function delete(ProductRepository $productRepository, int $id): JsonResponse
    {
        $product = $productRepository->find(['id' => $id]);

        if (!$product) {
            return $this->respondNotFound();
        }

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($product);
        $entityManager->flush();

        return $this->json('product ' . $product->getName() . ' deleted successfully');
    }

    /**
     * @Route("/api/carts/validate", name="app_product_validate", methods={"PUT"})
     */
    public function validate(UserService $userService)
    {
        $order = new Order();
        $entityManager = $this->getDoctrine()->getManager();
        $user = $userService->getCurrentUser();

        $order
            ->setCreatedAt(new \DateTime('now'))
            ->setUser($user);

        foreach ($user->getProduct() as $product) {
            $entityManager->persist($product);
            $order
                ->setTotalPrice($order->getTotalPrice() + $product->getPrice())
                ->addProduct($product);
        }
        $entityManager->persist($order);
        $entityManager->flush();


        return $this->json('ok');
    }
    /**
     * @Route("/api/carts/{id}", name="app_product_add", methods={"PUT"})
     */
    public function AddOrDeleteToCart(ProductRepository $productRepository, UserService $userService, int $id): JsonResponse
    {
        $product = $productRepository->find(['id' => $id]);
        $user = $userService->getCurrentUser();
        $entityManager = $this->getDoctrine()->getManager();
        $verb = '';

        if ($product->getUsers()->contains($user)) {
            $user->removeProduct($product);
            $verb = 'delet';
        } else {
           $user->addProduct($product);
           $verb = 'add';
       }

          $entityManager->persist($user);
          $entityManager->flush();

          return $this->json('product ' . $product->getName() . ' ' . $verb . 'ed successfully to the shopping cart');
    }

    /**
     * @Route("/api/carts", name="app_product_show", methods={"GET"})
     */
    public function showCart(UserService $userService): JsonResponse
    {
        $user = $userService->getCurrentUser();

        return $this->json($user->getProduct());
    }
}
