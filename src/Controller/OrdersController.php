<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrdersController extends AbstractController
{
    /**
     * @Route("/orders", name="app_orders")
     */
    public function index(): Response
    {
        $orders = $this->getDoctrine()
            ->getRepository(Orders::class)
            ->findAll();
 
        $data = [];

        foreach ($orders as $order) {
            $data[] = [
                'id' => $order->getId(),
                'totalPrice' => $order->getTotalPrice(),
                'creationDate' => $order->getCreationDate(),
                'products' => $order->getProducts(), 
            ];
         }

        return $this->json([$data]);
    }
}
