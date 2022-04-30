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

class CartController extends ApiController
{


    /**
     * @Route("/api/carts/validate", name="app_product_validate", methods={"PUT"})
     */
    public function validate(UserService $userService)
    {
        $order = new Order();
        $entityManager = $this->getDoctrine()->getManager();
        $user = $userService->getCurrentUser();

        $order
            ->setCreationDate(new \DateTime('now'))
            ->setUser($user);

        foreach ($user->getProducts() as $product) {
            $entityManager->persist($product);
            $order
                ->setTotalPrice($order->getTotalPrice() + $product->getPrice())
                ->addProducts($product);
        }
        $entityManager->persist($order);
        $entityManager->flush();


        return $this->json('Cart has been validated, placed into order.'. $order->getId());
    }
    /**
     * @Route("/api/carts/{id}", name="app_product_add", methods={"PUT"})
     */
    public function AddToCart(ProductRepository $productRepository, UserService $userService, int $id): JsonResponse
    {
        $product = $productRepository->find(['id' => $id]);
        $user = $userService->getCurrentUser();
        $entityManager = $this->getDoctrine()->getManager();

        if (!$product->getUsers()->contains($user)) {
           $user->addProduct($product);
       }
       else {
        return $this->json('product ' . $product->getName() . ' already in the cart');
       }

          $entityManager->persist($user);
          $entityManager->flush();

          return $this->json('product ' . $product->getName() . ' added to the cart');
    }

    /**
     * @Route("/api/carts/{id}", name="app_product_del", methods={"DELETE"})
     */
    public function deleteFromCart(ProductRepository $productRepository, UserService $userService, int $id): JsonResponse
    {
        $product = $productRepository->find(['id' => $id]);
        $user = $userService->getCurrentUser();
        $entityManager = $this->getDoctrine()->getManager();

        if ($product->getUsers()->contains($user)) {
            $user->removeProduct($product);
        } 
        else {
            return $this->json('product ' . $product->getName() . ' is not on the cart');
        }
          $entityManager->persist($user);
          $entityManager->flush();

          return $this->json('product ' . $product->getName() . ' deleted from the cart');
    }
    /**
     * @Route("/api/carts", name="app_product_show", methods={"GET"})
     */
    public function showCart(UserService $userService): JsonResponse
    {
        $user = $userService->getCurrentUser();

        return $this->json($user->getProducts());
    }
}