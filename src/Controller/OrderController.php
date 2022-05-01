<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Product;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use App\Security\ApiKeyAuthenticator;
use App\Service\UserService;
use Doctrine\DBAL\Driver\Exception;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends ApiController
{
/**
     * @Route("/api/orders", name="app_order_show", methods={"GET"})
     */
    public function showOrder(UserService $userService): JsonResponse
    {
        $user = $userService->getCurrentUser();

        return $this->json($user->getOrdr());
    }

    /**
     * @Route("/api/orders/{id}", name="app_order_show_one", methods={"GET"})
     */
    public function showOneOrder(OrderRepository $orderRepository, UserService $userService, int $id): JsonResponse
    {
        $order = $orderRepository->find(['id' => $id]);

        $user = $userService->getCurrentUser();

        if (!$user->getOrdr()->contains($order)) {
            return $this->respondUnauthorized();
        }

        return $this->json($order);
    }
}